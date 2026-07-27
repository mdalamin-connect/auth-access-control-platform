<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class LeaveController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\CustomAuth');
    }

    public function index()
    {
        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
        
        if (in_array($user_role_id, [1, 2])) { // Admin or HR
            $leaves = Leave::with(['employee', 'leaveType', 'creator', 'updater'])
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        } else { // Regular employee
            $leaves = Leave::with(['employee', 'leaveType', 'creator', 'updater'])
                ->where('employee_id', $user_id)
                ->orderBy('created_at', 'desc')
                ->paginate(20);
        }

        return view('pages.erp.leave.index', [
            'leaves' => $leaves,
            'user_role_id' => $user_role_id
        ]);
    }

    public function create()
    {
        $leaveTypes = \App\Models\LeaveType::all();
        $user_id = session('sess_user_id');
        
        if (!$user_id) {
            return redirect()->route('login')->with('error', 'Please login to apply for leave');
        }

        return view('pages.erp.leave.create', [
            'leaveTypes' => $leaveTypes,
            'user_role_id' => session('sess_user_role_id')
        ]);
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'leave_type_id' => 'required|exists:leave_types,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required|string|max:500'
        ]);

        $user_id = session('sess_user_id');

        // Check if dates are in the past
        if (strtotime($request->start_date) < strtotime(date('Y-m-d'))) {
            return back()->with('error', 'Cannot apply for leave in the past.');
        }

        // Check for overlapping leaves
        $overlappingLeave = Leave::where('employee_id', $user_id)
            ->where('status', 'approved')
            ->where(function($query) use ($request) {
                $query->whereBetween('start_date', [$request->start_date, $request->end_date])
                    ->orWhereBetween('end_date', [$request->start_date, $request->end_date])
                    ->orWhere(function($query) use ($request) {
                        $query->where('start_date', '<=', $request->start_date)
                            ->where('end_date', '>=', $request->end_date);
                    });
            })
            ->exists();

        if ($overlappingLeave) {
            return back()->with('error', 'You already have an approved leave during this period.');
        }

        $leave = new Leave();
        $leave->employee_id = $user_id;
        $leave->leave_type_id = $request->leave_type_id;
        $leave->start_date = $request->start_date;
        $leave->end_date = $request->end_date;
        $leave->reason = $request->reason;
        $leave->created_by = $user_id;
        $leave->save();

        return redirect()->route('leaves.index')->with('success', 'Leave application submitted successfully.');
    }

    public function show($id)
    {
        $leave = Leave::with(['employee', 'leaveType', 'creator', 'updater'])->findOrFail($id);
        $user_role_id = session('sess_user_role_id');
        
        // Check if user is authorized to view this leave
        if (!in_array($user_role_id, [1, 2]) && $leave->employee_id != session('sess_user_id')) {
            abort(403, 'Unauthorized');
        }

        return view('pages.erp.leave.show', [
            'leave' => $leave,
            'user_role_id' => $user_role_id
        ]);
    }

    public function updateStatus(Request $request, $id)
    {
        $request->validate([
            'status' => 'required|in:approved,rejected',
            'comments' => 'nullable|string|max:500'
        ]);

        $leave = Leave::findOrFail($id);
        $user_role_id = session('sess_user_role_id');

        if (!in_array($user_role_id, [1, 2])) {
            abort(403, 'Unauthorized');
        }

        $leave->status = $request->status;
        $leave->comments = $request->comments;
        $leave->updated_by = session('sess_user_id');
        $leave->save();

        return redirect()->route('leaves.index')->with('success', 'Leave status updated successfully.');
    }

    public function destroy($id)
    {
        $leave = Leave::findOrFail($id);
        $user_id = session('sess_user_id');
        
        // Only allow deletion if user is admin or the leave creator
        if (!in_array(session('sess_user_role_id'), [1, 2]) && $leave->employee_id != $user_id) {
            abort(403, 'Unauthorized');
        }

        // Only allow deletion if leave is pending
        if ($leave->status != 'pending' && !in_array(session('sess_user_role_id'), [1, 2])) {
            return back()->with('error', 'Only pending leaves can be deleted.');
        }

        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave application deleted successfully.');
    }

    public function leaveBalance()
    {
        $user_id = session('sess_user_id');
        $leaveTypes = LeaveType::all();
        
        $balances = [];
        foreach ($leaveTypes as $type) {
            $usedDays = Leave::where('employee_id', $user_id)
                ->where('leave_type_id', $type->id)
                ->where('status', 'approved')
                ->whereYear('created_at', date('Y'))
                ->sum(DB::raw('DATEDIFF(end_date, start_date) + 1'));

            $balances[$type->id] = [
                'name' => $type->name,
                'allocated' => $type->days_per_year,
                'used' => $usedDays,
                'remaining' => $type->days_per_year - $usedDays
            ];
        }

        return view('pages.erp.leave.balance', [
            'balances' => $balances,
            'user_role_id' => session('sess_user_role_id')
        ]);
    }
}
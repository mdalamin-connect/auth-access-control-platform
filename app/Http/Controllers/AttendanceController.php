<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\CustomAuth');
    }

    public function index()
    {
        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
        
        $employees = User::where('status', 1)->get(); // Add this line
        
        if (in_array($user_role_id, [1, 2])) { // Admin or HR
            $attendances = Attendance::with(['employee', 'creator', 'updater'])
                ->orderBy('date', 'desc')
                ->paginate(20);
        } else { // Regular employee
            $attendances = Attendance::with(['employee', 'creator', 'updater'])
                ->where('employee_id', $user_id)
                ->orderBy('date', 'desc')
                ->paginate(20);
        }

        return view('pages.erp.attendance.index', [
            'attendances' => $attendances,
            'user_role_id' => $user_role_id,
            'employees' => $employees // Add this line
        ]);
    }

    public function create()
    {
        $employees = User::where('status', 1)->get();
        return view('pages.erp.attendance.create', ['employees' => $employees]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:users,id',
            'date' => 'required|date',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after:check_in',
            'status' => 'required|in:present,absent,late,half_day,holiday,leave',
            'notes' => 'nullable|string|max:500'
        ]);

        $attendance = new Attendance();
        $attendance->employee_id = $request->employee_id;
        $attendance->date = $request->date;
        $attendance->check_in = $request->check_in;
        $attendance->check_out = $request->check_out;
        $attendance->status = $request->status;
        $attendance->notes = $request->notes;
        $attendance->created_by = session('sess_user_id');
        $attendance->save();

        return redirect()->route('attendances.index')->with('success', 'Attendance record created successfully.');
    }

    public function show($id)
    {
        $attendance = Attendance::with(['employee', 'creator', 'updater'])->findOrFail($id);
        return view('pages.erp.attendance.show', ['attendance' => $attendance]);
    }

    public function edit($id)
    {
        $attendance = Attendance::findOrFail($id);
        $employees = User::where('status', 1)->get();
        return view('pages.erp.attendance.edit', [
            'attendance' => $attendance,
            'employees' => $employees
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'employee_id' => 'required|exists:mpmc_users,id',
            'date' => 'required|date',
            'check_in' => 'nullable|date_format:H:i',
            'check_out' => 'nullable|date_format:H:i|after:check_in',
            'status' => 'required|in:present,absent,late,half_day,holiday,leave',
            'notes' => 'nullable|string|max:500'
        ]);

        $attendance = Attendance::findOrFail($id);
        $attendance->employee_id = $request->employee_id;
        $attendance->date = $request->date;
        $attendance->check_in = $request->check_in;
        $attendance->check_out = $request->check_out;
        $attendance->status = $request->status;
        $attendance->notes = $request->notes;
        $attendance->updated_by = session('sess_user_id');
        $attendance->save();

        return redirect()->route('attendances.index')->with('success', 'Attendance record updated successfully.');
    }

    public function destroy($id)
    {
        $attendance = Attendance::findOrFail($id);
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance record deleted successfully.');
    }

    public function markAttendance(Request $request)
    {
        $user_id = session('sess_user_id');
        $today = date('Y-m-d');
        
        $existing = Attendance::where('employee_id', $user_id)
            ->where('date', $today)
            ->first();

        if ($existing) {
            // Update check-out if check-in already exists
            if ($existing->check_in && !$existing->check_out) {
                $existing->check_out = date('H:i:s');
                $existing->status = 'present';
                $existing->updated_by = $user_id;
                $existing->save();
                return response()->json(['success' => true, 'action' => 'check_out']);
            }
            return response()->json(['success' => false, 'message' => 'Attendance already marked for today']);
        }

        // Create new check-in
        $attendance = new Attendance();
        $attendance->employee_id = $user_id;
        $attendance->date = $today;
        $attendance->check_in = date('H:i:s');
        $attendance->status = 'present';
        $attendance->created_by = $user_id;
        $attendance->save();

        return response()->json(['success' => true, 'action' => 'check_in']);
    }

   public function monthlyReport(Request $request)
{
    $request->validate([
        'month' => 'required|numeric|min:1|max:12',
        'year' => 'required|numeric|min:2000|max:2100',
        'employee_id' => 'nullable|exists:users,id'
    ]);

    $user_role_id = session('sess_user_role_id');
    $employee_id = $request->employee_id;

    if (!in_array($user_role_id, [1, 2])) { // Not admin or HR
        $employee_id = session('sess_user_id');
    }

    $attendances = Attendance::whereYear('date', $request->year)
        ->whereMonth('date', $request->month)
        ->when($employee_id, function($query) use ($employee_id) {
            return $query->where('employee_id', $employee_id);
        })
        ->with('employee')
        ->orderBy('date')
        ->get();

    //  get all active users
    $employees = User::where('status', 1)->get();

    return view('pages.erp.attendance.report', [
        'attendances' => $attendances,
        'month' => $request->month,
        'year' => $request->year,
        'selected_employee' => $employee_id,
        'employees' => $employees,  
        'user_role_id' => $user_role_id
    ]);
}
}
<?php

namespace App\Http\Controllers;

use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class LeaveTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\CustomAuth');
    }

    public function index()
    {
        $leaveTypes = LeaveType::with(['creator', 'updater'])
            ->orderBy('name')
            ->paginate(20);

        return view('pages.erp.leave_type.index', [
            'leaveTypes' => $leaveTypes,
            'user_role_id' => session('sess_user_role_id')
        ]);
    }

    public function create()
    {
        return view('pages.erp.leave_type.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:mpmc_leave_types,name',
            'days_per_year' => 'required|numeric|min:0|max:365',
            'description' => 'nullable|string|max:500'
        ]);

        $leaveType = new LeaveType();
        $leaveType->name = $request->name;
        $leaveType->days_per_year = $request->days_per_year;
        $leaveType->description = $request->description;
        $leaveType->created_by = session('sess_user_id');
        $leaveType->save();

        return redirect()->route('leave_types.index')->with('success', 'Leave type created successfully.');
    }

    public function show($id)
    {
        $leaveType = LeaveType::with(['creator', 'updater'])->findOrFail($id);
        return view('pages.erp.leave_type.show', ['leaveType' => $leaveType]);
    }

    public function edit($id)
    {
        $leaveType = LeaveType::findOrFail($id);
        return view('pages.erp.leave_type.edit', ['leaveType' => $leaveType]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:50|unique:mpmc_leave_types,name,' . $id,
            'days_per_year' => 'required|numeric|min:0|max:365',
            'description' => 'nullable|string|max:500'
        ]);

        $leaveType = LeaveType::findOrFail($id);
        $leaveType->name = $request->name;
        $leaveType->days_per_year = $request->days_per_year;
        $leaveType->description = $request->description;
        $leaveType->updated_by = session('sess_user_id');
        $leaveType->save();

        return redirect()->route('leave_types.index')->with('success', 'Leave type updated successfully.');
    }

    public function destroy($id)
    {
        $leaveType = LeaveType::findOrFail($id);
        
        // Check if any leaves are associated with this type
        $leavesCount = DB::table('mpmc_leaves')
            ->where('leave_type_id', $id)
            ->count();

        if ($leavesCount > 0) {
            return redirect()->route('leave_types.index')
                ->with('error', 'Cannot delete leave type as it has associated leave applications.');
        }

        $leaveType->delete();
        return redirect()->route('leave_types.index')->with('success', 'Leave type deleted successfully.');
    }
}
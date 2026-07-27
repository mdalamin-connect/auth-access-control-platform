<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class DepartmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('App\Http\Middleware\CustomAuth');
    }

    private function getUserPermissions()
    {
        $userRole = session('sess_user_role_name');
        return Role::where('name', $userRole)->first()?->permissions->pluck('name')->toArray() ?? [];
    }

    private function checkPermission($permission)
    {
        $userPermissions = $this->getUserPermissions();
        if (!in_array($permission, $userPermissions)) {
            return redirect()->route('admin.dashboard')->with('error', 'Unauthorized access!');
        }
        return null;
    }

    public function index()
    {
        $permissionCheck = $this->checkPermission('Department List');
        if ($permissionCheck) return $permissionCheck;

        $departments = Department::with(['creator', 'updater'])
            ->orderBy('id', 'asc')
            ->paginate(10);
            
        return view("pages.erp.department.index", [
            "departments" => $departments,
            "user_role_id" => session('sess_user_role_id')
        ]);
    }

    public function create()
    {
        $permissionCheck = $this->checkPermission('Create Department');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.department.create");
    }

    public function store(Request $request)
    {
        $permissionCheck = $this->checkPermission('Create Department');
        if ($permissionCheck) return $permissionCheck;

        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:departments,name',
            'description' => 'nullable|string|max:255',
        ]);

        Department::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'created_by' => session('sess_user_id', 0),
        ]);

        return redirect()->route("departments.index")->with('success', 'Created Successfully.');
    }
    
    public function show(Department $department)
    {
        $permissionCheck = $this->checkPermission('Department Details');
        if ($permissionCheck) return $permissionCheck;

        $department->load(['creator', 'updater']);
        return view("pages.erp.department.show", [
            "department" => $department,
            "description" => $department->description ?: 'No description provided'
        ]);
    }

    public function edit(Department $department)
    {
        $permissionCheck = $this->checkPermission('Edit Department');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.department.edit", [
            "department" => $department,
            "user_role_id" => session('sess_user_role_id')
        ]);
    }

    public function update(Request $request, Department $department)
    {
        $permissionCheck = $this->checkPermission('Edit Department');
        if ($permissionCheck) return $permissionCheck;

        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:departments,name,'.$department->id,
            'description' => 'nullable|string|max:255',
        ]);
    
        $department->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'updated_by' => session('sess_user_id', 0),
        ]);

        return redirect()->route("departments.index")->with('success', 'Updated Successfully.');
    }

    public function destroy(Department $department)
    {
        $permissionCheck = $this->checkPermission('Delete Department');
        if ($permissionCheck) return $permissionCheck;

        $department->delete();
        return redirect()->route("departments.index")->with('success', 'Deleted Successfully.');
    }
}
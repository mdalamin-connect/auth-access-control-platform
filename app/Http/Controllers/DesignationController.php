<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Designation;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Pagination\Paginator;

class DesignationController extends Controller
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
        $permissionCheck = $this->checkPermission('Designation List');
        if ($permissionCheck) return $permissionCheck;

        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');

        $designations = Designation::with(['creator','updater'])->paginate(10);
        
        return view("pages.erp.designation.index", [
            "designations" => $designations,
            "user_role_id" => $user_role_id
        ]);
    }

    public function create()
    {
        $permissionCheck = $this->checkPermission('Create Designation');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.designation.create");
    }

    public function store(Request $request)
    {
        $permissionCheck = $this->checkPermission('Create Designation');
        if ($permissionCheck) return $permissionCheck;

        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:designations,name',
            'description' => 'nullable|string|max:255',
        ]);

        $designation = new Designation;
        $designation->name = $validated['name'];
        $designation->description = $validated['description'];
        
        date_default_timezone_set("Asia/Dhaka");
        $designation->created_at = date('Y-m-d H:i:s');
        $designation->created_by = session('sess_user_id', 0);
        
        $designation->save();

        return redirect()->route("designations.index")->with('success', 'Created Successfully.');
    }

    public function show($id)
    {
        $permissionCheck = $this->checkPermission('Designation Details');
        if ($permissionCheck) return $permissionCheck;

        $designation = Designation::find($id)->load(['creator', 'updater']);
        return view("pages.erp.designation.show", ["designation" => $designation]);
    }

    public function edit(Designation $designation)
    {
        $permissionCheck = $this->checkPermission('Edit Designation');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.designation.edit", [
            "designation" => $designation,
            "user_role_id" => session('sess_user_role_id')
        ]);
    }

    public function update(Request $request, Designation $designation)
    {
        $permissionCheck = $this->checkPermission('Edit Designation');
        if ($permissionCheck) return $permissionCheck;

        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:designations,name,'.$designation->id,
            'description' => 'nullable|string|max:255',
        ]);

        $designation = Designation::find($designation->id);
        $designation->name = $validated['name'];
        $designation->description = $validated['description'];
        
        date_default_timezone_set("Asia/Dhaka");
        $designation->updated_at = date('Y-m-d H:i:s');
        $designation->updated_by = session('sess_user_id', 0);
        
        $designation->save();

        return redirect()->route("designations.index")->with('success', 'Updated Successfully.');
    }

    public function destroy(Designation $designation)
    {
        $permissionCheck = $this->checkPermission('Delete Designation');
        if ($permissionCheck) return $permissionCheck;

        $designation->delete();
        return redirect()->route("designations.index")->with('success', 'Deleted Successfully.');
    }
}
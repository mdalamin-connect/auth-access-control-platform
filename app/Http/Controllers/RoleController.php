<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class RoleController extends Controller
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
            return redirect()->route(route: 'admin.dashboard')->with('error', 'Unauthorized access!');
        }
        return null;
    }

    public function index()
    {
        $permissionCheck = $this->checkPermission('Roles List');
        if ($permissionCheck) return $permissionCheck;

        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
    
        $roles = Role::with(['permissions', 'creator', 'updater'])
                    ->paginate(10); 
    
        return view("pages.erp.role.index", [
            "roles" => $roles,
            "user_role_id" => $user_role_id,
            "permissions" => Permission::all()
        ]);
    }

    public function create()
    {
        $permissionCheck = $this->checkPermission('Create Roles');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.role.create", ["permissions" => Permission::all()]);
    }

    public function store(Request $request)
    {
        $permissionCheck = $this->checkPermission('Create Roles');
        if ($permissionCheck) return $permissionCheck;

        $existingRole = Role::where('name', $request->name)->first();

        if ($existingRole) {
            $existingRole->permissions()->sync($request->permissions);
            return back()->with('success', 'Permissions synced successfully.');
        }

        $createdBy = session('sess_user_id', null);
        if (!$createdBy) {
            return back()->with('error', 'Session user ID is missing. Please log in again.');
        }

        $role = new Role;
        $role->name = $request->name;

        date_default_timezone_set("Asia/Dhaka");
        $role->created_at = date('Y-m-d H:i:s');
        $role->created_by = $createdBy;

        $role->save();
        $role->permissions()->sync($request->permissions);
        
        return redirect()->route("roles.index")->with('success', 'Created Successfully.');
    }

    public function show($id)
    {
        $permissionCheck = $this->checkPermission('Roles Details');
        if ($permissionCheck) return $permissionCheck;

        $role = Role::with('permissions')->find($id);
        $permissions = Permission::all();

        return view("pages.erp.role.show", ["role" => $role, "permissions" => $permissions]);
    }

    public function edit(Role $role)
    {
        $permissionCheck = $this->checkPermission('Edit Roles');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.role.edit", [
            "role" => $role, 
            "permissions" => Permission::all()
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $permissionCheck = $this->checkPermission('Edit Roles');
        if ($permissionCheck) return $permissionCheck;

        $updatedBy = session('sess_user_id', null);
        if (!$updatedBy) {
            return back()->with('error', 'Session user ID is missing. Please log in again.');
        }

        $role = Role::find($role->id);
        $role->name = $request->name;

        date_default_timezone_set("Asia/Dhaka");
        $role->updated_at = date('Y-m-d H:i:s');
        $role->updated_by = $updatedBy;

        $role->save();
        $role->permissions()->sync($request->permissions);

        return redirect()->route("roles.index")->with('success', 'Updated Successfully.');
    }

    public function destroy(Role $role)
    {
        $permissionCheck = $this->checkPermission('Delete Roles');
        if ($permissionCheck) return $permissionCheck;

        $role->delete();
        return redirect()->route("roles.index")->with('success', 'Deleted Successfully.');
    }
}
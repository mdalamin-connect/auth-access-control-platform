<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PermissionController extends Controller
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
        $permissionCheck = $this->checkPermission('Permission List');
        if ($permissionCheck) return $permissionCheck;

        $user_id = session('sess_user_id');
        $user_role_id = session('sess_user_role_id');
        
        $permissions = Permission::with(['creator','updater'])
            ->paginate(30);
            
        return view("pages.erp.permission.index", [
            "permissions" => $permissions,
            "user_role_id" => $user_role_id
        ]);
    }

    public function create()
    {
        $permissionCheck = $this->checkPermission('Create Permission');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.permission.create", []);
    }

    public function store(Request $request)
    {
        $permissionCheck = $this->checkPermission('Create Permission');
        if ($permissionCheck) return $permissionCheck;

        $permission = new Permission;
        $permission->name = $request->name;
        $permission->description = $request->description;
        
        date_default_timezone_set("Asia/Dhaka");
        $permission->created_at = date('Y-m-d H:i:s');
        $permission->created_by = session('sess_user_id', 0);

        $permission->save();

        return redirect()->route("permissions.index")->with('success', 'Created Successfully.');
    }

    public function show($id)
    {
        $permissionCheck = $this->checkPermission('Permission Details');
        if ($permissionCheck) return $permissionCheck;

        $permission = Permission::find($id)->load(['creator', 'updater']);

        return view("pages.erp.permission.show", ["permission" => $permission]);
    }

    public function edit(Permission $permission)
    {
        $permissionCheck = $this->checkPermission('Edit Permission');
        if ($permissionCheck) return $permissionCheck;

        return view("pages.erp.permission.edit", [
            "permission" => $permission,
            "user_role_id" => session('sess_user_role_id')
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $permissionCheck = $this->checkPermission('Edit Permission');
        if ($permissionCheck) return $permissionCheck;

        $permission = Permission::find($permission->id);
        $permission->name = $request->name;
        $permission->description = $request->description;

        date_default_timezone_set("Asia/Dhaka");
        $permission->updated_at = date('Y-m-d H:i:s');
        $permission->updated_by = session('sess_user_id', 0);
        
        $permission->save();

        return redirect()->route("permissions.index")->with('success', 'Updated Successfully.');
    }

    public function destroy(Permission $permission)
    {
        $permissionCheck = $this->checkPermission('Delete Permission');
        if ($permissionCheck) return $permissionCheck;

        $permission->delete();
        return redirect()->route("permissions.index")->with('success', 'Deleted Successfully.');
    }
}
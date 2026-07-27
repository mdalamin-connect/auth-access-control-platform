<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
use App\Models\User;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response) $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->session()->has('sess_user_role_id') && $request->session()->get('sess_user_role_id') != 0) {

            $userRole = $request->session()->get('sess_user_role_name');
            $userPermissions = Role::where('name', $userRole)->first()->permissions->pluck('name')->toArray();
            $allowedRoles = $this->getAllowedRolesAndPermissions(); // Ensure this line is present

            if ($this->hasAllowedPermission($userRole, $userPermissions, $allowedRoles)) {
                // Check user status before proceeding
                $loggedInUserId = $request->session()->get('sess_user_id');
                if ($this->isUserEnabled($loggedInUserId, $loggedInUserId)) {
                    return $next($request);
                } else {
                    // Redirect or handle disabled user
                    return redirect('/')->with('error', 'Your account is disabled. Please contact support.');
                }
            } else {
                // Corrected redirect to the root
                return redirect('/')->with('error', 'Unauthorized'); // Redirect unauthorized users
            }
        }

        abort(403, 'Unauthorized');
    }

    /**
     * Get the dynamic roles and permissions from the database.
     *
     * @return array
     */
    private function getAllowedRolesAndPermissions()
    {
        $allowedRoles = [];

        // Retrieve all roles from the database
        $roles = Role::all();

        foreach ($roles as $role) {
            // Retrieve permissions for each role
            $permissions = $role->permissions->pluck('name')->toArray();

            // Build the allowedRoles array dynamically
            $allowedRoles[$role->name] = $permissions;
        }

        return $allowedRoles;
    }

    /**
     * Check if the user has at least one allowed permission for their role.
     *
     * @param string $userRole
     * @param array $userPermissions
     * @param array $allowedRoles
     * @return bool
     */
    private function hasAllowedPermission($userRole, $userPermissions, $allowedRoles)
    {
        return isset($allowedRoles[$userRole]) &&
            count(array_intersect($userPermissions, $allowedRoles[$userRole])) > 0;
    }

    /**
     * Check if the user is enabled.
     *
     * @param int $loggedInUserId
     * @param int $targetUserId
     * @return bool
     */
    private function isUserEnabled($loggedInUserId, $targetUserId)
    {
        $loggedInUser = User::find($loggedInUserId);
        $targetUser = User::find($targetUserId);

        if ($loggedInUser && $targetUser && $loggedInUser->role_id && $targetUser->role_id) {
            // Allow all authenticated users to access the dashboard
            return true;
        }

        return false;
    }
}

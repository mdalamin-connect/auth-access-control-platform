<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    public function delete(User $authenticatedUser, User $userToDelete)
    {
        if (!$userToDelete || !$userToDelete->roles) {
            return false; // Return false if the user or user's roles are not found
        }

        if ($authenticatedUser->roles->name === 'Super-Admin') {
            // Super-Admin can delete any user or admin
            return true;
        } elseif ($authenticatedUser->roles->name === 'Admin') {
            // Admin can delete users but not other admins
            return $userToDelete->roles->name !== 'Admin';
        } else {
            // Regular users cannot delete anyone
            return false;
        }
    }
}

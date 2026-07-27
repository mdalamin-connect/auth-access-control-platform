<?php

namespace App\Policies;

use App\Models\Holiday;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class HolidayPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Holiday $holiday)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Holiday $holiday)
    {
        return true;
    }

    public function delete(User $user, Holiday $holiday)
    {
        return true;
    }
}
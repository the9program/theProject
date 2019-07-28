<?php

namespace App\Policies\Appointment;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AvailabilityPolicy
{
    use HandlesAuthorization;

    public function availability(User $user)
    {
        return $user->category_id === 5 || $user->category_id === 6;
    }
}

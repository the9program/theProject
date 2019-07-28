<?php

namespace App\Policies;

use App\Doctor;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorPolicy
{
    use HandlesAuthorization;


    public function index(User $user)
    {

        return $user->category
            ->roles()
            ->where('role','potential_doctor_list')
            ->first();

    }

    public function create(User $user)
    {

        return $user->category
            ->roles()
            ->where('role','potential_doctor_create')
            ->first();

    }

    public function update(User $user, Doctor $doctor)
    {

        $role = $user->category
            ->roles()
            ->where('role','potential_doctor_create')
            ->first();

        return ((!$doctor->user_id) && ($role)) ;

    }
}
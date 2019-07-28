<?php

namespace App\Policies;

use App\Doctor;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class DoctorPolicy
{
    use HandlesAuthorization;

    public function before(User $user)
    {
        return ($user->category_id === 1) ? true : null;
    }

    public function index(User $user)
    {
        if(isset($user->category->roles[0])){
            return $user->category
                ->roles()
                ->where('role','potential_doctor_list')
                ->first();
        }

        return false;

    }

    public function create(User $user)
    {

        if(isset($user->category->roles[0])){

            return $user->category
                ->roles()
                ->where('role','potential_doctor_create')
                ->first();

        }

        return false;

    }

    public function update(User $user, Doctor $doctor)
    {

        if(isset($user->category->roles[0])){
            $role = $user->category
                ->roles()
                ->where('role','potential_doctor_create')
                ->first();

            return ((!$doctor->user_id) && ($role)) ;
        }

        return false;

    }

    public function presence(User $user)
    {

        if(isset($user->category->roles[0])){

            return $user->category
                ->roles()
                ->where('role','presence_create')
                ->first();

        }

        return false;

    }
}

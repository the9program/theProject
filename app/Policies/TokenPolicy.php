<?php

namespace App\Policies;

use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TokenPolicy
{
    use HandlesAuthorization;

    public function token(User $user)
    {
        return $user->category_id === 1;
    }

    public function admin(User $user)
    {
        if(isset($user->category->roles[0])){

            return $user->category
                ->roles()
                ->where('role','admin')
                ->first();

        }

        return false;
    }
}

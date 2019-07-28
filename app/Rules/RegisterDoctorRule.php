<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class RegisterDoctorRule implements Rule
{

    public function passes($attribute, $value)
    {
        $user = User::where([['email',$value], ['password','!=',null]])->first();
        if($user){
            return false;
        }

        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'cette addres email apartient a quelqu\'un d\'autre';
    }
}

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
            dd($user);
            return false;
        }

        return true;
    }


    public function message()
    {
        return 'cette addres email apartient a quelqu\'un d\'autre';
    }
}

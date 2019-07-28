<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class RegisterDoctorRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return User::where([['email',$value], ['password','!=',null]])->first();
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

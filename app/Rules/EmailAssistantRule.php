<?php

namespace App\Rules;

use App\User;
use Illuminate\Contracts\Validation\Rule;

class EmailAssistantRule implements Rule
{

    public function passes($attribute, $value)
    {

        $user = User::where('email', $value)->first();

        if($user->category_id){

            return false;

        }

        return true;

    }

    public function message()
    {
        return 'The account assigned have another category.';
    }
}

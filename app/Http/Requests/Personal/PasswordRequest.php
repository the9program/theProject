<?php

namespace App\Http\Requests\Personal;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{

    public function authorize()
    {

        return true;

    }


    public function rules()
    {

        return [
            'current_password'  => ['required', 'string', 'min:8'],
            'password'          => ['required', 'string', 'min:8', 'confirmed'],
        ];

    }
}

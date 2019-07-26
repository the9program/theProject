<?php

namespace App\Http\Requests\Personal;

use App\Rules\Personal\BirthRule;
use App\Rules\Personal\GenderRule;
use App\Rules\Personal\MobileRule;
use Illuminate\Foundation\Http\FormRequest;

class TokenRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        return [
            'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
            'last_name'     => ['required', 'string', 'min:3', 'max:8'],
            'first_name'    => ['required', 'string', 'min:3', 'max:8'],
            'gender'        => ['required', 'int', new GenderRule()],
            'birth'         => ['required', 'date', new BirthRule()],
            'mobile'        => ['required', 'string', 'max:10', 'min:10', new MobileRule()],
            'token'         => ['required', 'min:10', 'max:255', 'exists:tokens,token']
        ];

    }
}

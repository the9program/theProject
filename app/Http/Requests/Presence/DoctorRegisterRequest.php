<?php

namespace App\Http\Requests\Presence;

use App\Rules\Personal\BirthRule;
use App\Rules\Personal\GenderRule;
use Illuminate\Foundation\Http\FormRequest;

class DoctorRegisterRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'gender'        => ['required', 'int', new GenderRule()],
            'birth'         => ['required', 'date', new BirthRule()],
            'password'      => ['required', 'string', 'min:8', 'confirmed'],
        ];
    }
}

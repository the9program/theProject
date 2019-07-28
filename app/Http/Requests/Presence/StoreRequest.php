<?php

namespace App\Http\Requests\Presence;

use App\Rules\RegisterDoctorRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'         => ['required','max:255','email', new RegisterDoctorRule()],
        ];
    }
}

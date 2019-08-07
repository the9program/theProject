<?php

namespace App\Http\Requests\Presence;

use App\Rules\Personal\GenderRule;
use App\Rules\Personal\MobileRule;
use Illuminate\Foundation\Http\FormRequest;

class MedicalFormRequest extends FormRequest
{


    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'last_name'     => ['required', 'string', 'min:3', 'max:8'],
            'first_name'    => ['required', 'string', 'min:3', 'max:8'],
            'gender'        => ['required', 'int', new GenderRule()],
            'birth'         => ['required', 'date'],
            'mobile'        => ['required', 'string', 'max:10', 'min:10', new MobileRule()],
        ];
    }
}

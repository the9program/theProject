<?php

namespace App\Http\Requests\Personal;

use App\Rules\Personal\CategoryRule;
use Illuminate\Foundation\Http\FormRequest;

class TokenEmailRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'email'     => 'required|email|unique:users,id,' . auth()->id(),
            'category' => ['required', 'int', 'exists:categories,id', new CategoryRule()]
        ];

    }
}

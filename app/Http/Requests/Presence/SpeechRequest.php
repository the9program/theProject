<?php

namespace App\Http\Requests\Presence;

use Illuminate\Foundation\Http\FormRequest;

class SpeechRequest extends FormRequest
{

    public function authorize()
    {
        if(auth()->user()->doctor->id === $this->doctor->id){

            return true;

        }

        return false;

    }

    public function rules()
    {
        return [
            'speech'    => 'required|string|min:25'
        ];
    }
}

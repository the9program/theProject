<?php

namespace App\Http\Requests\Appointment;

use Illuminate\Foundation\Http\FormRequest;

class AvailabilityRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'day'               => 'required|date|after:yesterday',
            'from'              => 'required|date_format:H:i',
            'to'                => 'required|date_format:H:i|after:from',
        ];
    }
}

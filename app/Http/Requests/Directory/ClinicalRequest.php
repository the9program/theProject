<?php

namespace App\Http\Requests\Directory;

use App\Rules\Personal\MobileRule;
use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed consultation
 * @property mixed operation
 * @property mixed emergency
 * @property mixed payment
 * @property mixed charges
 * @property mixed hospitalisation
 * @property mixed doctors
 * @property mixed nurse
 * @property mixed handicap
 */
class ClinicalRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {

        return [
            'name'              => ['required', 'string', 'min:3', 'max:255'],
            'speech'            => ['nullable', 'string'],
            'address'           => ['required', 'string', 'max:255'],
            'build'             => ['required', 'int', 'min:1'],
            'floor'             => ['nullable', 'int', 'max:1000'],
            'apt_nbr'           => ['required_with:floor', 'max:10000'],
            'zip'               => ['nullable', 'int', 'max:10000000000'],
            'city_id'           => ['required', 'int', 'exists:cities,id'],
            'number_emergency'  => ['nullable','string', new PhoneRule()],
            'lun_from'          => ['required', 'date_format:H:i'],
            'lun_to'            => ['required', 'date_format:H:i'],
            'sam_from'          => ['required', 'date_format:H:i'],
            'sam_to'            => ['required', 'date_format:H:i'],
            'dim_from'          => ['nullable', 'required_with:dim_to', 'date_format:H:i'],
            'dim_to'            => ['nullable', 'required_with:dim_from', 'date_format:H:i'],
        ];

    }

}

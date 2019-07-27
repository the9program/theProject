<?php

namespace App\Http\Requests\Directory;

use App\Rules\Personal\GenderRule;
use App\Rules\PhoneRule;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property mixed mobile
 * @property int specialty
 */
class DoctorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'last_name'     => ['required', 'string', 'min:3', 'max:8'],
            'first_name'    => ['required', 'string', 'min:3', 'max:8'],
            'gender'        => ['required', 'int', new GenderRule()],
            'mobile'        => ['required', 'string', 'max:10', 'min:10', new PhoneRule()],
            'specialty'     => ['required', 'int', 'exists:specialties,id'],
            'address'       => ['required', 'string', 'max:255'],
            'build'         => ['required', 'int', 'min:1',],
            'floor'         => ['nullable', 'int', 'min:1', 'max:1000'],
            'apt_nbr'       => ['required_with:floor', 'min:1', 'max:10000'],
            'zip'           => ['nullable', 'int', 'max:10000000000'],
            'city_id'       => ['required', 'int', 'exists:cities,id']
        ];
    }
}

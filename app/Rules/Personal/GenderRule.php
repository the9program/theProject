<?php

namespace App\Rules\Personal;

use Illuminate\Contracts\Validation\Rule;

class GenderRule implements Rule
{

    public function passes($attribute, $value)
    {

        return $value === '1' || $value === 0;

    }

    public function message()
    {

        return __('validation.not_regex', [

            'attribute' => __('validation.attributes.gender')

        ]);

    }

}

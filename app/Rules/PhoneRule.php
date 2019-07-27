<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class PhoneRule implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match("/^(0)[5-7]{1}[0-9]{8}$/", $value);
    }

    public function message()
    {

        return __('validation.not_regex',[

            'attribute' => __('validation.attributes.mobile')

        ]);

    }
}

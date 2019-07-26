<?php

namespace App\Rules\Personal;

use Illuminate\Contracts\Validation\Rule;

class MobileRule implements Rule
{

    public function passes($attribute, $value)
    {
        return preg_match("/^(0)[6-7]{1}[0-9]{8}$/", $value);
    }

    public function message()
    {

        return __('validation.not_regex',[

            'attribute' => __('validation.attributes.mobile')

        ]);

    }
}

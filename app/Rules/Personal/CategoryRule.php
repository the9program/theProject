<?php

namespace App\Rules\Personal;

use Illuminate\Contracts\Validation\Rule;

class CategoryRule implements Rule
{

    public function passes($attribute, $value)
    {

        return $value != '1';

    }

    public function message()
    {

        return __('validation.not_regex',[

            'attribute' => __('validation.attributes.category')

        ]);

    }

}

<?php

namespace App\Rules\Personal;

use Carbon\Carbon;
use Illuminate\Contracts\Validation\Rule;

class BirthRule implements Rule
{

    public function passes($attribute, $value)
    {

        return Carbon::parse($value)
                ->format('Y-m-d') <=
            Carbon::now()
                ->subYears(18)
                ->format('Y-m-d')
            && Carbon::parse($value)
                ->format('Y-m-d') >
            Carbon::parse('1920-01-01')
                ->format('Y-m-d')
            ;

    }

    public function message()
    {

        return __('validation.minor', [

            'attribute' => __('validation.attributes.birth')

        ]);

    }

}

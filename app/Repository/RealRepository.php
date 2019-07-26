<?php

namespace App\Repository;


use App\Http\Requests\Personal\ParamsRequest;

class RealRepository
{

    public function updateReal(ParamsRequest $request)
    {
        $real = auth()->user()->real;

        return $real->update($request->all([
            'last_name', 'first_name', 'gender', 'birth'
        ]));

    }
}
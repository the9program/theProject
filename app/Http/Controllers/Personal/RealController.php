<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;


class RealController extends Controller
{

    public function profile()
    {
        $appointments = auth()->user()->appointments()->get();

        return view('real.profile',[
            'user' => auth()->user(),
            'appointments' => $appointments
        ]);

    }
}

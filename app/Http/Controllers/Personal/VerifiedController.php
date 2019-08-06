<?php

namespace App\Http\Controllers\Personal;

use App\Notifications\Personal\PhoneVerifiedSendCode;
use App\Phone;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifiedController extends Controller
{
    public function edit(Phone $verified)
    {
        //dd($verified);
        $code = rand(1000,9999);
        $verified->update([
            'verified'  => $code
        ]);

        $verified->notify(new PhoneVerifiedSendCode($code));
        return view('pages.sms',compact('verified'));
    }

    public function update(Request $request, Phone $verified)
    {
        dd($request);
    }
}

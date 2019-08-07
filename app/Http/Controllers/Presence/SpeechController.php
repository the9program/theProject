<?php

namespace App\Http\Controllers\Presence;


use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Presence\SpeechRequest;
use Illuminate\Http\Request;

class SpeechController extends Controller
{

    public function speech(Doctor $doctor)
    {
        return view('presence.speech.speech',compact('doctor'));
    }

    public function update(SpeechRequest $request, Doctor $doctor)
    {

        $doctor->update([
            'speech'    => $request->speech
        ]);

        session()->flash('success', __('presence/speech.updated'));

        return redirect()->route('doctor.show',compact('doctor'));

    }

}
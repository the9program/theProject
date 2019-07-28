<?php

namespace App\Http\Controllers\Appointment;

use App\Appointment;
use App\Availability;
use App\Form;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function edit(Appointment $appointment)
    {

        $this->authorize('availability',Availability::class);

        return view('appointment.edit',compact('appointment'));

    }

    public function update(Request $request, Appointment $appointment)
    {

        $this->authorize('availability',Availability::class);
        $form = $this->form($request);

        $appointment->update([
            'form_id'   => $form->id,
            'user_id'   => $form->user_id
        ]);

        return redirect()->route('availability.show',['availability' => $appointment->availability]);

    }

    private function form($request)
    {

        $form = Form::where($request->all(['last_name', 'first_name', 'gender', 'birth',]))->first();

        if($form){

            return $form;

        }

        return auth()->user()->forms_created()->create($request->all());

    }

    public function passed(Appointment $appointment)
    {
        $this->authorize('availability',Availability::class);

        $appointment->update(['passed' => now()]);

        return back();

    }
}

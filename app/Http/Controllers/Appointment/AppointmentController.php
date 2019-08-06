<?php

namespace App\Http\Controllers\Appointment;

use App\Appointment;
use App\Availability;
use App\Doctor;
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

        return redirect()->route('availability.show',[
            'availability' => $appointment->availability
        ]);

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

    public function appointment(Request $request)
    {
        $availabilities = Availability::whereDate('from',$request->availability)->get();
        $appointments = [];
        foreach ($availabilities as $availability) {
            $appointments[] = $availability->appointments;
        }

        return view('appointment.appointment',compact('appointments'));

    }

    public function store(Request $request)
    {
        $appointment = Appointment::find($request->appointment);
        $form = (isset(auth()->user()->form->id)) ? auth()->user()->form->id : null;

        $appointment->update([
            'user_id'   => 1,
            'form_id'   => $form
        ]);
        session()->flash('success','Votre RDV est bien Pris');
        return back();
    }

    public function activate(Request $request, Doctor $doctor)
    {

        if(auth()->user()->can('premium',$doctor)){

            $doctor->update([
                'premium'   => true
            ]);

            session()->flash('success','Le système de RDV a bien été activer');

        }

        else{

            session()->flash('danger','Vous n\'avez pas les autorisations nécessaire pour faire cette action');

        }

        return redirect()->route('doctor.show',compact('doctor'));

    }

    public function inactivate(Request $request, Doctor $doctor)
    {

        if(auth()->user()->can('premium',$doctor)){

            $doctor->update([
                'premium'   => false
            ]);

            session()->flash('success','Le système de RDV a bien été déactiver');

        }

        else{

            session()->flash('danger','Vous n\'avez pas les autorisations nécessaire pour faire cette action');

        }

        return redirect()->route('doctor.show',compact('doctor'));
    }


}

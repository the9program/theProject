<?php

namespace App\Http\Controllers\Appointment;

use App\Appointment;
use App\Availability;
use App\Doctor;
use App\Form;
use App\Http\Controllers\Controller;
use App\Http\Requests\Presence\MedicalFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class AppointmentController extends Controller
{

    public function show(Availability $availability)
    {
        $this->authorize('availability',Availability::class);

        return view('appointment.availability._list',['appointments' => $availability->appointments]);

    }

    public function edit(Appointment $appointment)
    {

        $this->authorize('availability',Availability::class);

        if($appointment->user_id || $appointment->form_id){

            session()->flash('danger', 'Ce RDV est pris veuillez choisir un autre ou le libéré par le bouton ghost');

            return redirect()->route('availability.show',[
                'availability'  => $appointment->availability
            ]);

        }

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

    public function ghost(Appointment $appointment)
    {
        $this->authorize('availability',Availability::class);

        $appointment->update([
            'user_id'       => null,
            'form_id'       => null,
            'passed'        => null,
            'arrived'       => null,
        ]);

        return back();
    }

    public function arrived(Appointment $appointment)
    {
        $this->authorize('availability',Availability::class);
        if($appointment->form_id){
            $appointment->update([
                'arrived'   => now()
            ]);
            return back();
        }

       return redirect()->route('form.syn',compact('appointment'));

    }

    public function syncForm(Appointment $appointment)
    {

        if($appointment->form_id){

            session()->flash('danger','Ce RDV à déja une Fiche Médicale');

            return redirect()->route('availability.show',[
                'availability'   => $appointment->availability
            ]);

        }

        return view('appointment.sync',compact('appointment'));
    }

    public function sync(MedicalFormRequest $request, Appointment $appointment)
    {

        $request->request->add([
            'creator_id'    => auth()->id()
        ]);

        $form = Form::create($request->all([
            'last_name', 'first_name', 'gender', 'birth', 'mobile','creator_id'
        ]));

        $appointment->update([
            'arrived'   => now(),
            'form_id'   => $form->id,
        ]);

        return redirect()->route('availability.show',[
            'availability'   => $appointment->availability
        ]);

    }

    public function first(Appointment $appointment)
    {
        $this->authorize('availability',Availability::class);

        $first = $appointment->availability->appointments()->where([
            ['passed',null]
        ])->first();

        $l = [
            'user_id'   => $first->user_id,
            'form_id'   => $first->form_id,
            'passed'    => $first->passed,
            'arrived'   => $first->arrived
        ];
        $f = [
            'user_id'   => $appointment->user_id,
            'form_id'   => $appointment->form_id,
            'passed'    => $appointment->passed,
            'arrived'   => $appointment->arrived
        ];

        $appointment->update($l);

        $first->update($f);

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

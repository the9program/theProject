<?php

namespace App\Http\Controllers;


use App\Doctor;
use App\Http\Requests\Presence\DoctorRegisterRequest;
use App\Http\Requests\Presence\StoreRequest;
use App\Notifications\Presence\ActivateNotification;
use App\Repository\DoctorRepository;

class DoctorRegisterController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest')
            ->only(['RegisterForm','register']);

        $this->middleware('auth')
            ->only(['create','store']);

    }

    public function create(Doctor $doctor)
    {
        $this->authorize('presence',Doctor::class);

        if(isset($doctor->user->real)){

            session()->flash('warning', __('directory/doctor.doctor_exist'));

            return redirect()->route('doctor.show',compact('doctor'));

        }

        return view('presence.create');

    }

    public function store(StoreRequest $request,Doctor $doctor)
    {

        $this->authorize('presence',Doctor::class);

        if($user = $doctor->user){

            $user->notify( new ActivateNotification($user->getRememberToken(), $doctor));

            session()->flash('success', __('directory/doctor.resended'));

            return back();

        }

        $token = md5(sha1(rand()));

        $user = $doctor->user()->create([
            'email'             => $request->email,
            'remember_token'    => $token,
            'category_id'       => 5,
            'creator_id'        => auth()->id()
        ]);

        $doctor->update(['user_id' => $user->id]);

        $user->notify( new ActivateNotification($token, $doctor));

        session()->flash('success', __('directory/doctor.sended'));

        return back();

    }

    public function RegisterForm(Doctor $doctor,string $token)
    {

        return view('presence.register',compact('token','doctor'));
    }

    public function register(DoctorRegisterRequest $request, Doctor $doctor,DoctorRepository $repository)
    {

        if($doctor->user->getRememberToken() != $request->token){
            session()->flash('warning', '');
            return back();
        }

        $repository->register($request,$doctor);

        session()->flash('success', __('directory/doctor.account_created'));

        return redirect()->route('login');

    }
}

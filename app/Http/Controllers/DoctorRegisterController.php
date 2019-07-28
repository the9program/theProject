<?php

namespace App\Http\Controllers;


use App\Doctor;
use App\Http\Requests\Presence\DoctorRegisterRequest;
use App\Http\Requests\Presence\StoreRequest;
use App\Notifications\Presence\ActivateNotification;
use App\Token;

class DoctorRegisterController extends Controller
{

    public function __construct()
    {

        $this->middleware('guest')
            ->only(['RegisterForm','register']);

        $this->middleware('auth')
            ->only(['create','store']);

    }

    public function create()
    {
        $this->authorize('presence',Doctor::class);

        return view('presence.create');

    }

    public function store(StoreRequest $request,Doctor $doctor)
    {

        $this->authorize('presence',Doctor::class);
        if($user = $doctor->user){

            $user->notify( new ActivateNotification($user->getRememberToken(), $doctor));

            session()->flash('success', 'un email a été renvoyer');

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

        session()->flash('success', 'un email a bien été envoyer');

        return back();

    }

    public function RegisterForm(Doctor $doctor,string $token)
    {

        return view('presence.register',compact('token','doctor'));
    }

    public function register(DoctorRegisterRequest $request, Doctor $doctor)
    {
       // dd($doctor->user->getRememberToken());
        if($doctor->user->getRememberToken() != $request->token){
            session()->flash('warning', 'votre jeton de permission est invalide veuillez cliker sur le mail');
            return back();
        }

        $doctor->user->update([
            'password'  => bcrypt($request->password)
        ]);

        $doctor->user->real()->create([
            'last_name'     => $doctor->last_name,
            'first_name'    => $doctor->first_name,
            'gender'        => $request->gender,
            'birth'         => $request->birth,
        ]);

        $doctor->user->form()->create([
            'last_name'     => $doctor->last_name,
            'first_name'    => $doctor->first_name,
            'gender'        => $request->gender,
            'birth'         => $request->birth,
            'mobile'        => $request->mobile,
            'creator_id'    => $doctor->user->creator_id
        ]);


        session()->flash('success', 'Votre Compte a bien été créer veuillez vous conécté');

        return redirect()->route('login');

    }
}

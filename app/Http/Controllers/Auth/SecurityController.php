<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Personal\EmailRequest;
use App\Http\Requests\Personal\PasswordRequest;
use App\Repository\UserRepository;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class SecurityController extends Controller
{

    public function security()
    {

        return view('auth.security');

    }

    public function email(EmailRequest $request,UserRepository $repository)
    {
        if(auth()->user()->email != $request->email)
        {

            if($repository->updateMyEmail($request->email)){

                session()->flash('success', 'Votre Addresse email a bien été Modifier');

                return redirect()->route('home');

            }


            session()->flash('warning', 'Une Erreur s\'est produit l\'or de la modification de votre 
            address mail veuillez ressayer à nouveau');

        }

        return back();

    }


    public function password(PasswordRequest $request,UserRepository $repository)
    {

        if (Hash::check($request->current_password, auth()->user()->password)) {

            if (!Hash::check($request->password, auth()->user()->password)) {

                if($repository->changeMyPassword($request->password)) {

                    session()->flash('success', 'Votre mot de passe a bien été Modifier');

                    return  redirect()->route('home');

                }

                session()->flash('warning', 'Une Erreur s\'est produit l\'or de la modification de votre 
                        address mot de passe veuillez ressayer à nouveau');

                return  back();

            }


            return  back()->withErrors([
                'password' => 'Vous avez indiqué le même mot de passe!'
            ])
                ->withInput();

        }

        return back()
            ->withErrors([
                'current_password' => 'Votre mot de passe Actuel est incorrect'
            ])
            ->withInput();

    }
}

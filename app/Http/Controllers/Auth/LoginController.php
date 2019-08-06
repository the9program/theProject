<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{

    use AuthenticatesUsers;

    protected $redirectTo = '/';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        if(auth()->user()->category_id === 5){
            if(!isset(auth()->user()->doctor->languages[0])){

                return route('languages.create');
            }
            if(!auth()->user()->doctor->experiences()->where('study',1)->first()){

                return route('study.create');
            }
            if(!auth()->user()->doctor->experiences()->where('study',false)->first()){

                return route('experience.create');
            }
        }
        return '/';
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class Language
{

    public function handle($request, Closure $next)
    {

        if(Session::has('locale')){

            $locale = Session::get('locale',Config::get('app.locale'));

        }

        else{

            $locale = \app()->getLocale();

        }

        App::setLocale($locale);

        return $next($request);

    }
}

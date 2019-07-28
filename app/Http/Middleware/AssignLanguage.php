<?php

namespace App\Http\Middleware;

use Closure;

class AssignLanguage
{

    public function handle($request, Closure $next)
    {

        if(isset(auth()->user()->doctor->languages[0])){

            return $next($request);
        }

        return redirect()->route('languages.create');
    }

}

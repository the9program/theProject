<?php

namespace App\Http\Middleware;

use Closure;

class Experience
{

    public function handle($request, Closure $next)
    {

        if(auth()->user()->doctor->experiences()->where('study',false)->first()){

            return $next($request);
        }

        return redirect()->route('experience.create');

    }
}

<?php

namespace App\Http\Middleware;

use Closure;

class Study
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(auth()->user()->doctor->experiences()->where('study',1)->first()){

            return $next($request);
        }

        return redirect()->route('study.create');
    }
}

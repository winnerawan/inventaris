<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ProgramStudy
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
//        if (Auth::check() && Auth::user()->role == 'program_study') {
//            return $next($request);
//        }
//        elseif (Auth::check() && Auth::user()->role == 'program_study') {
//            return redirect('/program_study');
//        }
//        else {
//            return redirect('/admin');
//        }
        return $next($request);
    }
}

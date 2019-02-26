<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check())
        {
            if (Auth::user()->hasRole('admin'))
            {
                return redirect('/admin');
            }
            elseif (Auth::user()->hasRole('estudiante'))
            {
                return redirect('/estudiante');
            }
            elseif (Auth::user()->hasRole('directoradm'))
            {
                return redirect('/directoradm');
            }
            elseif (Auth::user()->hasRole('directorpro'))
            {
                return redirect('/directorpro');
            }
            elseif (Auth::user()->hasRole('docente'))
            {
                return redirect('/docente');
            }
            elseif (Auth::user()->hasRole('secretario'))
            {
                return redirect('/secretario');
            }
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */


        protected $redirectTo = '/estudiante';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectPath()
    {
        if (Auth::user()->hasRole('admin'))
        {
            return '/administrador';
        }
        elseif (Auth::user()->hasRole('estudiante'))
        {
            return '/estudiante';
        }
        elseif (Auth::user()->hasRole('directoradm'))
        {
            return '/directoradm';
        }
        elseif (Auth::user()->hasRole('directorpro'))
        {
            return '/directorpro';
        }
        elseif (Auth::user()->hasRole('docente'))
        {
            return '/docente';
        }
        elseif (Auth::user()->hasRole('secretario'))
        {
            return '/secretario';
        }
        elseif (Auth::user()->hasRole('encargadoserv'))
        {
            return '/encargadoserv';
        }

    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
     * Redirecció d'Usuaris després d'iniciar sessió
     *
     * @var string
     */
    protected function authenticated(Request $request, $user){
    
        return redirect()->route('races');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    //Funció per redirigir els usuaris segons rol
    /*public function redirect(){
        if (auth()->user->user_type == 'organizer') {
            return route('organizer.races');
        }

        return route('runner.privatezone');
    }*/
}

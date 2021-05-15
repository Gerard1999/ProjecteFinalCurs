<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Runner;
use App\Organizer;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index(){
        $users = User::latest()->get();

        return view('users.index', [
            'users' => $users
        ]);
    }

    //Registrar un Corredor
    public function storeRunner(Request $request){

        $request->validate([
            'name'      => 'required',
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8'],
            'telephone'  => ['required', 'min:9', 'max:9'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'user_type' => 'runner',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telephone' => $request->telephone,
            'nif' => $request->nif,
            'address' => $request->address,
            'city' => $request->city,
        ]);

        Runner::create([
            'surname' => $request->surname,
            'user_id' => $user->id,
        ]);

        Auth::login($user);

        return redirect()->route('races');
    }

    //Registrar un Organitzador
    public function storeOrganizer(Request $request){

        $request->validate([
            'name'      => 'required',
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8'],
            'telephone'  => ['required', 'min:9', 'max:9'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'user_type' => 'organizer',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'telephone' => $request->telephone,
            'nif' => $request->nif,
            'address' => $request->address,
            'city' => $request->city,
        ]);

        Organizer::create([
            'user_id' => $user->id,
            'link_web' => $request->link_web,
            'link_instagram' => $request->link_instagram,
            'link_facebook' => $request->link_facebook,
            'link_twitter' => $request->link_twitter,
        ]);

        Auth::login($user);

        return redirect()->route('races');
    }

    public function destroy(User $user){
        
        $user->delete();

        return back();
    }
}

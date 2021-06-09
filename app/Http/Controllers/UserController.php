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
            'name'      => ['required','max:25'],
            'surname'   => ['required','max:25'],
            'city'      => ['required','max:30'],
            'address'   => ['required','max:50'],
            'nif'       => ['required','max:9', 'min:9'],
            'email'     => ['required', 'email', 'unique:users'],
            'password'  => ['required', 'min:8'],
            'telephone' => ['required', 'min:9', 'max:9'],
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
            'name'      => ['required','max:50'],
            'city'      => ['required','max:50'],
            'address'   => ['required','max:100'],
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

    public function destroy($idUser){
        $user = User::where('id',$idUser)->first();
        $user->delete();

        if (User::where('id',$idUser)->first()) {
            return back()->with('status', "Hi hagut un error, no s'ha pogut esborrar l'usuari");
        }

        return back()->with('status', 'Corredor esborrat correctament');
    }
}

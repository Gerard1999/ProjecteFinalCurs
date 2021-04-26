<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Runner;
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

        return redirect()->route('home');
    }

    public function destroy(User $user){
        
        $user->delete();

        return back();
    }
}

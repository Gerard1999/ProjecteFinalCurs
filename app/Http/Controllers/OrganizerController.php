<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Product;

class OrganizerController extends Controller
{
    public function showRegisterForm(){
        return view('registerorganizer');
    }

    public function organizerzone(){
        return view('organizerzone.index');
    }
}

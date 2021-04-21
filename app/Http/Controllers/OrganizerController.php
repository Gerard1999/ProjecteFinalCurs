<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class OrganizerController extends Controller
{
    public function showRegisterForm()
    {
        return view('registerorganizer');
    }
}

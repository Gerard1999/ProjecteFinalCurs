<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SuperAdmin extends Controller
{
    public function superadminzone(){
        return view('superadmin.index');
    }
}

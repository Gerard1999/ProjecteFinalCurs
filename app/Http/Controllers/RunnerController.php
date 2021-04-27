<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RunnerController extends Controller
{
    public function privatezone(){
        return view('privatezone.index');
    }
}

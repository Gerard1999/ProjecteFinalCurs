<?php

namespace App\Http\Controllers;

use App\Race;
use App\Product;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function races(){
        return view('races', [
            'races' => Race::with('organizer')->latest()->paginate()
        ]);
    }

    public function race(Race $race){
        return view('race', ['race' => $race]);
    }

    public function products(){
        return view('products', [
            'products' => Product::get()
        ]);
    }
}

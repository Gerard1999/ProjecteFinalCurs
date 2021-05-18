<?php

namespace App\Http\Controllers;

use App\Race;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function races(Request $request){

        $nomCursa = $request->nomCursa;
        $poblacio = $request->poblacio;
        $minKms   = $request->minKms; 

        return view('races', [
            'races' => Race::with('organizer')
                ->nomCursa($nomCursa)
                ->poblacio($poblacio)
                ->minKms($minKms)
                ->paginate()
        ]);
    }

    public function race(Race $race){
        return view('race', ['race' => $race]);
    }
}

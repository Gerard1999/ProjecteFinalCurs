<?php

namespace App\Http\Controllers;

use App\Race;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    public function races(Request $request){

        $nomCursa = $request->nomCursa;
        $poblacio = $request->poblacio;
        $minKms   = $request->minKms; 

        return view('races', [
            'races' => Race::with('organizer')
                ->where('validate', 1)
                ->nomCursa($nomCursa)
                ->poblacio($poblacio)
                ->minKms($minKms)
                ->paginate(10)
        ]);
        // return view('races', [
        //     'races' => DB::select('SELECT r.* FROM races r
        //                     LEFT JOIN categories c ON r.id = c.race_id')
        // ]);
        // dd($races);
    }

    public function race(Race $race){
        if($race->validate){
            return view('race', ['race' => $race]);
        }
        return back();
    }


    public function images() {

        return view('gallery', [
            'races' => Race::where('validate', 1)->paginate(6)
        ]);
    }
}

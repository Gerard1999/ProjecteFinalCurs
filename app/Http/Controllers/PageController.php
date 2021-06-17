<?php

namespace App\Http\Controllers;

use App\Race;
use Illuminate\Http\Request;
use DB;

class PageController extends Controller
{
    public function races(Request $request){

        $nomCursa       = $request->nomCursa;
        $poblacio       = $request->poblacio;
        $minKms         = $request->kmsmin;
        $maxKms         = $request->kmsmax;
        $minDesnivell   = $request->metresmin;
        $maxDesnivell   = $request->metresmax;

        $races = Race::where('validate', 1)
                ->select('races.*')
                ->leftJoin('categories','categories.race_id', '=', 'races.id')
                ->where('races.name', 'LIKE', '%'.$nomCursa.'%')
                ->where('races.location', 'LIKE', '%'.$poblacio.'%');

        if($minKms != NULL) {
            $races = $races->where('categories.kms', '>=', (int)$minKms);
        }
        if($maxKms != NULL) {
            $races = $races->where('categories.kms', '<=', (int)$maxKms);
        }
        if($minDesnivell != NULL) {
            $races = $races->where('categories.elevation_gain', '>=', (int)$minDesnivell);
        }
        if($maxDesnivell != NULL) {
            $races = $races->where('categories.elevation_gain', '<=', (int)$maxDesnivell);
        }

        $races = $races->distinct()->get();

        return view('races', compact('races'));

        // $races = Race::
        //     select('*')
        //     ->leftJoin('categories','races.id','=', 'categories.race_id');
        // if($nomCursa){
        //     $races->where('name', 'like', '%' . $nomCursa . '%');
        // }

        // if($poblacio){
        //     $races->where('location', 'like', '%' . $poblacio . '%');
        // }

        // $races = $races->get();
        // return view('races', compact('races'));
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

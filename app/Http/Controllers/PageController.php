<?php

namespace App\Http\Controllers;

use App\Race;
use Illuminate\Http\Request;
use Rawaby88\OpenWeatherMap\Services\CWByCityName;
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
        
            $cw = (new CWByCityName($race->location, 'es'))->get();
            $temperature = $cw->temperature; // return Temperature object
            $weather     = $cw->weather;     // return Weather object 
            $sun         = $cw->sun;         // return Sun object
            $race->temperature = $temperature;
            $race->weather = $weather;
            $race->sun = $sun;
            $race->weather->iconWeather = $this->getWeatherImage($race->weather->iconUrl);

            return view('race', ['race' => $race]);
        }
        return back();
    }

    public function getWeatherImage($urlImg) {
        // dd($urlImg);
        $url = 'images/weather/';
        // $img = "//openweathermap.org/img/w/05n.png";
        $icon = explode('/', $urlImg);
        $icon = ($icon[count($icon)-1]);

        switch ($icon) {
            //DIA
            case '01d.png':
                $img = $url.'sun.png';
                // Sol
                break;
            case '02d.png':
                $img = $url.'suncloud.png';
                // Sol i nuvol    
                break;
            case '03d.png':
                $img = $url.'cloud.png';
                // nuvol    
                break;
            case '04d.png':
                $img = $url.'clouds.png';
                // 2 nuvol    
                break;
            //NIT
            case '01n.png':
                $img = $url.'moon.png';
                // Lluna
                break;
            case '02n.png':
                $img = $url.'mooncloud.png';
                // Lluna i nuvol
                break;
            case '03n.png':
                $img = $url.'cloud.png';
                // nuvol    
                break;
            case '04n.png':
                $img = $url.'clouds.png';
                // 2 nuvol    
                break;
            
            // default:
            //     $img = $url.'.png';
            //     # code...
            //     break;
        }
        // dd($img);
        return $img;
    }

    public function images() {

        return view('gallery', [
            'races' => Race::where('validate', 1)->paginate(6)
        ]);
    }
}

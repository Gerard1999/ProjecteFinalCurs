<?php

namespace App\Http\Controllers;

use App\InscriptionsList;
use Illuminate\Http\Request;
use App\Race;
use App\Category;
use Auth;

class InscriptionsListController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Race $race) {
        return view('races.inscripcio', compact('race'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $validation = \Validator::make($request->all(), [
            
            'category_id'   => 'required',
            'user_id'       => 'required'
        ]);

        //Si hi ha errors de validació
        if ($validation->fails()){
            return redirect()->back()->withInput()->withErrors($validation->errors());
        }

        //Busca si hi ha registres amb les mateixes dades
        $inscriptonDuplicate = InscriptionsList::where("race_id","=",$request->race_id)
            ->where("user_id","=",$request->user_id)
            ->get();

        //Compte quants corredors hi ha a una categoria per adjudicar el dorsal
        $numCorredorsCategoria = InscriptionsList::where("category_id","=",$request->category_id)
            ->count();



        //Si hi ha una inscripció del mateix Usuari a la mateixa cursa retorna un error    
        if(count($inscriptonDuplicate)  >= 1){
            return back()->with('status', "Ja estàs inscrit en aquesta cursa");
        }

        //Guardar Inscripció
        $inscriptionsList = InscriptionsList::create([
            'race_id'       => $request->race_id,
            'category_id'   => $request->category_id,
            'user_id'       => $request->user_id,
            'num_dorsal'    => $numCorredorsCategoria + 1,
        ]);

        return redirect()->route('runner.inscriptionsummary', $inscriptionsList->id);
    }

    //Funció que envia una llista de curses de l'usuari en qüestió
    public function viewFutureRaces(){

        $inscripcions = InscriptionsList::where('user_id',Auth::user()->id)
            ->get();

        return view('privatezone.future-races', compact('inscripcions'));
    }
    
    public function viewPassedRaces(){
    
        $inscripcions = InscriptionsList::where('user_id',Auth::user()->id)
            ->get();
    
        return view('privatezone.passed-races', compact('inscripcions'));
    }

    public function getRunnersRace(Race $race) {
        $llistaCursa = InscriptionsList::where('race_id',$race->id)->get();
        return view('organizerzone.runners-list', compact('race', 'llistaCursa'));
    }

    public function inscriptionSummary($idInscripcio) {
        $inscripcio = InscriptionsList::where('id',$idInscripcio)->get();

        //Comprova que la inscripció sigui del usuari
        if ($inscripcio->user_id == Auth::user()->id) {
            return view('inscriptionsummary', compact('inscripcio'));
        }
        return back();
    } 
}

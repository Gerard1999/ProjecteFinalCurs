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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

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

        //Si hi ha una inscripció del mateix Usuari a la mateixa cursa retorna un error    
        if(count($inscriptonDuplicate)  >= 1){
            return back()->with('status', "No pots fer més d'una inscripció a la mateixa cursa");
        }

        //Guardar Inscripció
        $inscriptionsList = InscriptionsList::create([
            'race_id'       => $request->race_id,
            'category_id'   => $request->category_id,
            'user_id'       => $request->user_id,
        ]);

        return redirect()->route('races');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InscriptionsList  $inscriptionsList
     * @return \Illuminate\Http\Response
     */
    public function show(InscriptionsList $inscriptionsList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\InscriptionsList  $inscriptionsList
     * @return \Illuminate\Http\Response
     */
    public function edit(InscriptionsList $inscriptionsList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\InscriptionsList  $inscriptionsList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InscriptionsList $inscriptionsList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\InscriptionsList  $inscriptionsList
     * @return \Illuminate\Http\Response
     */
    public function destroy(InscriptionsList $inscriptionsList)
    {
        //
    }

    //Funció que envia una llista de curses de l'usuari en qüestió
    function viewFutureRaces(){

        $inscripcions = InscriptionsList::where('user_id',Auth::user()->id)
            ->get();

        return view('privatezone.future-races', compact('inscripcions'));
    }
    
    function viewPassedRaces(){
    
        $inscripcions = InscriptionsList::where('user_id',Auth::user()->id)
            ->get();
    
        return view('privatezone.passed-races', compact('inscripcions'));
    }

    function getRunnersRace(Race $race) {
        return view('organizerzone.runners-list', compact('race'));
    }
}

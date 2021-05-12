<?php

namespace App\Http\Controllers;

use App\InscriptionsList;
use Illuminate\Http\Request;
use App\Race;

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

        // $request->validate([
        //     'category_id'   => 'required',
        //     'user_id'       => 'required',
        // ]);

        //Guardar Inscripció
        $inscriptionsList = InscriptionsList::create([
            'category_id'   => $request->category,
            'user_id'       => $request->iduser,
        ]);

        return back()->with('status', 'Cursa actualitzada amb èxit');
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
}

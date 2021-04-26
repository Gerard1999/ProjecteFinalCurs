<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Race;
use App\Http\Requests\RaceRequest;
use Illuminate\Support\Facades\Storage;
use Auth;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $races = Race::where('organizer_id', auth()->user()->id)
                    ->orderBy('date')
                    ->get();
        return view('races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('races.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RaceRequest $request)
    {
        //Guardar
        $race = Race::create([
            'organizer_id' => auth()->user()->id
        ] + $request->all());

        //Guardar Imatge
        if ($request->file('img')) {
            $race->img_cover = $request->file('img')->store('races', 'public');
            $race->save();
        }
        
        //Retornar
        return back()->with('status', 'Creat amb èxit');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function edit(Race $race)
    {
        return view('races.edit', compact('race'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\RaceRequest  $request
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function update(RaceRequest $request, Race $race)
    {
        //Actualitzar les dades
        $race->update($request->all());

        if ($request->file('img')) {
            //Eliminar la imatge anterior per actualitzar la nova.
            Storage::disk('public')->delete($race->img_cover);
            $race->img_cover = $request->file('img')->store('races', 'public');
            $race->save();
        }

        return back()->with('status', 'Cursa actualitzada amb èxit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy(Race $race)
    {
        //Eliminem primer la imatge del disc
        Storage::disk('public')->delete($race->img_cover);
        
        $race->delete();

        return back()->with('status', 'Cursa esborrada correctament');
    }
}

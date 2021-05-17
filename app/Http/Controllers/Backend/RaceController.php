<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Race;
use App\Category;
use App\Http\Requests\RaceRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
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
        $races = Race::where('organizer_id', auth()->user()->organizer->id)
                    ->orderBy('date')
                    ->get();
        return view('races.index', compact('races'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        return view('races.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        //Guardar cursa
        $race = Race::create([
            'organizer_id'  => auth()->user()->organizer->id,
            'name'          => $request->name,
            'location'      => $request->location,
            'description'   => $request->description,
            'url'           => $request->url,
            'img_cover'     => $request->img,
            'date'          => $request->date,
            'name'          => $request->name,
        ]);

        $counter = $request['counter'];
        //Per cada Modalitat enviada crea una modalitat d'aquesta cursa
        for ($i=0; $i <= $counter; $i++) {
            $category = Category::create([
                'race_id'           => $race->id,
                'name_category'     => $request['name_category_'.$i],
                'kms'               => $request['kms_'.$i],
                'elevation_gain'    => $request['elevation_gain_'.$i],
                'location_start'    => $request['location_start_'.$i],
                'location_finish'   => $request['location_finish_'.$i],
                'start_time'        => $request['start_time_'.$i],
                'price'             => $request['price_'.$i],
                'num_aid_station'   => $request['num_aid_station_'.$i],
                'max_participants'  => $request['num_participants_'.$i],
            ]);
        }

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
    public function edit(Race $race){
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
        $race->organizer_id  = auth()->user()->organizer->id;
        $race->name          = $request->name;
        $race->location      = $request->location;
        $race->description   = $request->description;
        $race->url           = $request->url;
        $race->img_cover     = $request->img;
        $race->date          = $request->date;

        if ($request->file('img')) {
            //Eliminar la imatge anterior per actualitzar la nova.
            Storage::disk('public')->delete($race->img_cover);
            $race->img_cover = $request->file('img')->store('races', 'public');
        }
        $race->update();

        return back()->with('status', 'Cursa actualitzada amb èxit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy($idRace)
    {
        $race = Race::where('id',$idRace)->first();

        //Eliminem primer la imatge del disc
        Storage::disk('public')->delete($race->img_cover);
        
        $race->delete();
        if (Race::where('id',$idRace)->first()) {
            return back()->with('status', "Hi hagut un error, no s'ha pogut esborrar la cursa");
        }
        return back()->with('status', 'Cursa esborrada correctament');
    }
}

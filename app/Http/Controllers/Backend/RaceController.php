<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Race;
use App\Category;
use App\Http\Requests\RaceRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Auth;
use DB;

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
    public function store(RaceRequest $request)
    {      
        $request->rules();
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
                'elevation_img'     => $request['elevation_img_'.$i],
                'gpx'               => $request['gpx_'.$i],
            ]);
            if ($request->file('elevation_img_'.$i)) {
                $category->elevation_img = $request->file('elevation_img_'.$i)->store('races', 'public');
                $category->save();
            }
            if ($request->file('gpx_'.$i)) {
                $category->gpx = $request->file('gpx_'.$i)->store('gpx', 'public');
                $category->save();
            }
        }
        //Guardar Imatges
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
        $request->rules();
        $race = Race::find($race->id);
        //Guardar cursa
        $race->name         = $request->name;
        $race->location     = $request->location;
        $race->description  = $request->description;
        $race->url          = $request->url;
        $race->img_cover    = $request->img;
        $race->date         = $request->date;
        $race->name         = $request->name;
        $race->validate     = 0;

        $counter = $request['counter'];
        // dd($race->id);
        //Per cada Modalitat enviada crea una modalitat d'aquesta cursa
        Category::where('race_id', $race->id)->delete();
        // DB::table('categories')->where('race_id', $race->id)->delete();
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
                'elevation_img'     => $request['elevation_img_'.$i],
                'gpx'               => $request['gpx_'.$i],
                'updated_at'        => now(),
                'created_at'        => now(),

            ]);
            if ($request->file('elevation_img_'.$i)) {
                $category->elevation_img = $request->file('elevation_img_'.$i)->store('races', 'public');
                $category->save();
            }
            if ($request->file('gpx_'.$i)) {
                $category->gpx = $request->file('gpx_'.$i)->store('gpx', 'public');
                $category->save();
            }
        }
        //Guardar Imatges
        if ($request->file('img')) {
            // Storage::disk('races','public')->delete($race->img_cover);
            $race->img_cover = $request->file('img')->store('races', 'public');
            $race->update();
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

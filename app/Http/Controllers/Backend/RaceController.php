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

        $categoriesCursa = [
            []
        ];

        return view('races.create', compact('categoriesCursa'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RaceRequest $request)
    {
        //Guardar cursa
        $race = Race::create([
            'organizer_id'  => auth()->user()->id,
            'name'          => $request->name,
            'location'      => $request->location,
            'description'   => $request->description,
            'url'           => $request->url,
            'img_cover'     => $request->img,
            'date'          => $request->date,
            'name'          => $request->name,
        ]);


        $category = Category::create([
            'race_id' => $race->id,
            'name_category'     => 'Categoria de prova',
            'kms'               => 31,
            'elevation_gain'    => 200,
            'location_start'    => 'Osor',
            'location_finish'   => 'Osor',
            'start_time'        => '8:00:00',
            'price'             => 35,
            'num_aid_station'   => 2,
            'num_participants'  => 250,
        ]);

        //Guardar Imatge
        if ($request->file('img')) {
            $race->img_cover = $request->file('img')->store('races', 'public');
            $race->save();
        }

        //Guardar Categories
        // if ($request->ajax()) {
        //     $name_category = $request->name_category;
        //     $kms = $request->kms;
        //     $elevation_gain = $request->elevation_gain;
        //     $location_start = $request->location_start;
        //     $location_finish = $request->location_finish;
        //     $start_time = $request->start_time;
        //     $price = $request->price;
        //     $num_aid_station = $request->num_aid_station;
        //     $num_participants = $request->num_participants;

        //     for ($i=0; $i < count($name_category); $i++) { 
        //         $data = array(
        //             'name_category'     => $name_category[$i],
        //             'kms'               => $kms[$i],
        //             'elevation_gain'    => $elevation_gain[$i],
        //             'location_start'    => $location_start[$i],
        //             'location_finish'   => $location_finish[$i],
        //             'start_time'        => $start_time[$i],
        //             'price'             => $price[$i],
        //             'num_aid_station'   => $num_aid_station[$i],
        //             'num_participants'  => $num_participants[$i],
        //         );
        //         $insert_data[] = $data;

        //         Category::insert($insert_data);
        //         return response()->json([
        //             'success' => 'Cursa creada correctament'
        //         ]);
        //     }
        // }

        
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

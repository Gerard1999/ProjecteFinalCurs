<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Atributs de la taula que es poden omplir.
     *
     * @var array
     */
    protected $fillable = [
        'race_id', 'name_category', 'kms', 'elevation_gain', 'location_start',
        'location_finish', 'start_time', 'num_aid_station', 'price', 'max_participants', 
        'elevation_img', 'gpx'
    ];


    //Una categoria pertany a una cursa
    public function race(){
        return $this->belongsTo(Race::class);
    }

    //Relació : Una Categoria té moltes Inscripccions
    public function inscriptions(){
        return $this->hasMany(InscriptionsList::class);
    }

    /**
     * Funció que retorna la url de la imatge de la categoria
     */
    public function getGetImageAttribute(){
        return url("storage/$this->elevation_img");
    }
}

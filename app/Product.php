<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'link_photo', 'price', 'organizer_id', 'size_id'
    ];

    //Relació : Un Producte pertany a un Organitzador
    public function organizer(){
        return $this->belongsTo(Organizer::class);
    }

    //Relació : Un Producte té una Talla
    public function size(){
        return $this->belongsTo(Size::class);
    }

    /**
     * Funció que retorna la url de la imatge de la cursa
     */
    public function getGetImageAttribute(){
        return url("storage/$this->link_photo");
    }
}

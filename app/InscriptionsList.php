<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InscriptionsList extends Model
{
    /**
     * Atributs de la taula que es poden omplir.
     *
     * @var array
     */
    protected $fillable = [
        'race_id', 'category_id', 'user_id', 'num_dorsal',
    ];


    //Una Inscripcio pertany a una Categoria
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    //Una Inscripcio pertany a un User
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Una Inscripcio pertany a una Cursa
    public function race(){
        return $this->belongsTo(Race::class);
    }
}

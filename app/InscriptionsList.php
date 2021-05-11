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
        'category_id', 'user_id',
    ];


    //Una Inscripcio pertany a una Categoria
    public function category(){
        return $this->belongsTo(Category::class);
    }
    
    //Una Inscripcio pertany a un User
    public function category(){
        return $this->belongsTo(User::class);
    }
}

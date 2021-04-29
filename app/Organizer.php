<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    //Relació : Un Organitzador pot tenir moltes curses
    public function races(){
        return $this->hasMany(Race::class);
    }

    //Relació : Un Organitzador pertany a un usuari
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Relació : Un Organitzador pot tenir moltes productes
    public function product(){
        return $this->hasMany(Product::class);
    }

    /**
     * Atributs de la taula que es poden omplir.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'link_web', 'link_instagram', 'link_facebook', 'link_twitter',
    ];
}

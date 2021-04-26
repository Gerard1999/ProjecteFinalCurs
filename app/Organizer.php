<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    //Relació : Un Organitzador té moltes curses
    public function races(){
        return $this->hasMany(Race::class);
    }

    //Relació : Un Organitzador és d'un usuari
    public function user(){
        return $this->belongsTo(User::class);
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

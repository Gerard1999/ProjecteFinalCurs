<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organizer extends Model
{
    //Relació : Un Organitzador té moltes curses
    public function races(){
        return $this->hasMany(Race::class);
    }
}

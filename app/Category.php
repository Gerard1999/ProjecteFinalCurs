<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //Una categoria pertany a una cursa
    public function race(){
        return $this->belongsTo(Race::class);
    }
}

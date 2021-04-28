<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Funció que retorna la url de la imatge de la cursa
     */
    public function getGetImageAttribute(){
        return url("storage/$this->link_photo");
    }
}

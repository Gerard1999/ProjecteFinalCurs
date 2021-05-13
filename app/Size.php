<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //Una Talla pertany a un Producte
    public function product(){
        return $this->belongsTo(Product::class);
    }
}

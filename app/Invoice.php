<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'shopping_cart_id', 'user_id'
    ];

    //Una Factura és sobre un carro de la compra
    public function cart(){
        return $this->belongsTo(ShoppingCart::class);
    }

    //Una Factura és d'un usuari
    public function user(){
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    protected $fillable = [
        'status', 'user_id', 'date'
    ];

    //Relació de Detalls Carro de la compra
    public function cartDetails() {
        return $this->hasMany(ShoppingCartDetail::class);
    }

    //Relació de l'Usuari
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Funció per crear un carro de la compra al crear la sessió o buscar si ja hi ha un amb la sessió actual
    public static function findOrCreateBySessionId($shopping_cart_id) {
        if ($shopping_cart_id) {
            return ShoppingCart::find($shopping_cart_id);
        } else {
            return ShoppingCart::create();
        }
    }

}

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

    //Funció que retorna el total de procuctes en el carro
    public function quantityProducts() {
        return $this->cartDetails->sum('quantity');
    } 

    //Funció que calcula el preu del carro
    public function priceCart() {
        $total = 0;
        foreach ($this->cartDetails as $cartDetail) {
            $total += $cartDetail->price * $cartDetail->quantity;
        }
        return $total;
    }
}

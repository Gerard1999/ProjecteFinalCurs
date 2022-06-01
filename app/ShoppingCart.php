<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;

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

    //Relació de la factura
    public function invoice(){
        return $this->belongsTo(Invoice::class);
    }

    //Funció per crear un carro de la compra al crear la sessió o buscar si ja hi ha un amb la sessió actual
    public static function findOrCreateBySessionId($shopping_cart_id) {
        if ($shopping_cart_id) {
            $cart = ShoppingCart::find($shopping_cart_id);
            if($cart->status == 'FINSHED') {
                return ShoppingCart::create();
            }
            return $cart;
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
        return number_format($total, 2, ',', '.');
    }


    //Funció que retorna el id del Carro de la Compra actual
    public static function getShoppingCartId() {
        $shopping_cart_id = Session::get('shopping_cart_id');
        $shopping_cart = self::findOrCreateBySessionId($shopping_cart_id);
        return $shopping_cart;
    }

    //Funció que crea un nou carro de la compra (nova sessió)
    public static function createSession() {
        return ShoppingCart::create();
    }
}

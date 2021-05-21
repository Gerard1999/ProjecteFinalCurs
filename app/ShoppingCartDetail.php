<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShoppingCartDetail extends Model
{
    protected $fillable = [
        'quantity', 'price', 'shopping_cart_id', 'product_id', 'size'
    ];

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function shoppingCart() {
        return $this->belongsTo(ShoppingCart::class);
    }

    /*Funció que comprova si del nou detall producte està repetit el producte i la talla
    * Per tant, se li afegiria la quantitat del producte a la línia repetida
    */
    public static function checkProductSizeDetail($shopping_cart, $newCartDetail) {
        foreach ($shopping_cart->cartDetails as $detall) {
            //Comprova si la talla i el producte està repetit
            if ($detall->size == $newCartDetail->size) {
                dd($detall->size. " es igual a ". $newCartDetail->size);
            }
        }
    }
}

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

    /*Funció que comprova si del nou CartDetail està repetit el producte i la talla
    * Si és així, retorna aquesta CartDetail
    */
    public static function checkProductSizeDetail($shopping_cart, $newCartDetail) {
        foreach ($shopping_cart->cartDetails as $detail) {
            //Comprova si la talla i el producte està repetit
            if ($detail->size == $newCartDetail->size 
                and $detail->product_id == $newCartDetail->product_id) {
                return $detail;
            }
        }
    }

    //Funció que retorna el subtotal de CartDetail arrodonit a dos decimals
    public function sumPriceDetail() {
        return number_format($this->quantity * $this->product->price, 2, ',', '.');
    }
}

<?php

namespace App\Http\Controllers;

use App\ShoppingCartDetail;
use App\ShoppingCart;
use App\Product;
use Session;
use Illuminate\Http\Request;

class ShoppingCartDetailController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = Product::find($request->product_id);
        $shopping_cart = ShoppingCart::getShoppingCartId();

        //Ha de retornar true i el ID del DetailProduct, després suma la quantitat al detall
        ShoppingCartDetail::checkProductSizeDetail($shopping_cart, $request);
        
        $detail = $shopping_cart->cartDetails()->create([
            'quantity'      =>$request->quantity,
            'price'         =>$product->price,
            'product_id'    =>$request->product_id,
            'size'          =>$request->size,
        ]);

        return back()->with('status', "S'ha afegit el producte correctament");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingCartDetail $shoppingCartDetail)
    {
        //
    }
}

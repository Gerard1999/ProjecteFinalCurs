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
    public function store(Request $request, Product $product)
    {
        $product = Product::find($request->product_id);
        $shopping_cart = ShoppingCart::getShoppingCartId();

        //Si la talla i el producte està repetit suma la quantitat al CartDetail
        if ($cartDetailRepeated = ShoppingCartDetail::checkProductSizeDetail($shopping_cart, $request)) {
            $cartDetailRepeated->quantity += $request->quantity;
            $cartDetailRepeated->save();
        } else {
            //Sinó, crea un nou CartDetail
            $detail = $shopping_cart->cartDetails()->create([
                'quantity'      =>$request->quantity,
                'price'         =>$product->price,
                'product_id'    =>$request->product_id,
                'size'          =>$request->size,
            ]);
        }

        return back()->with('status', "S'ha afegit el producte correctament");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idShoppingCartDetail){
        $shoppingCartDetail = ShoppingCartDetail::where('id',$idShoppingCartDetail)->first();
        if ($request->accio == "sumar") {
            $shoppingCartDetail->quantity++;
            $shoppingCartDetail->save();
        } elseif ($request->accio == "restar") {
            $shoppingCartDetail->quantity--;
            $shoppingCartDetail->save();
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ShoppingCartDetail  $shoppingCartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy($idShoppingCartDetail)
    {
        $shoppingCartDetail = ShoppingCartDetail::where('id',$idShoppingCartDetail)->first();

        $shoppingCartDetail->delete();

        return back();
    }
}

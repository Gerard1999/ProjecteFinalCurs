<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ShoppingCart;
use App\Invoice;
use Auth;

class InvoiceController extends Controller
{
    public function index() {
        
    }

    public function indexOne($invoice) {
        $factura = Invoice::find($invoice);
        $carro = ShoppingCart::find($factura->shopping_cart_id);

        return view('shoppingcart.showinvoice', compact('carro'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $idCarro) {

        $cart = ShoppingCart::find($idCarro);
        if($cart->cartDetails->isEmpty()) {
            return back()->with('status', "No hi ha productes al carro");
        }
        
        //Guardar Factura
        $invoice = Invoice::create([
            'shopping_cart_id'  => $idCarro,
            'user_id'           => Auth::user()->id,
        ]);

        return redirect()->route('runner.showInvoice', $invoice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Race  $race
     * @return \Illuminate\Http\Response
     */
    public function destroy($idRace)
    {
        
    }
}

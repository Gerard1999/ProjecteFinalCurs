<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function products(){
        return view('products', [
            'products' => Product::get()
        ]);
    }

    public function product(Product $product){
        return view('product', ['product' => $product]);
    }

    //Eliminar un producte
    public function destroy($idProducte)
    {
        $product = Product::where('id',$idProducte)->first();
        //Eliminem primer la imatge del disc
        Storage::disk('public')->delete($product->link_photo);
        
        $product->delete(); 

        if (Product::where('id',$idProducte)->first()) {
            return back()->with('status', "Hi hagut un error, no s'ha pogut esborrar el producte");
        }

        return back()->with('status', 'Producte esborrat correctament');
    }
}

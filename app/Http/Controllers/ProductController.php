<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

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
}

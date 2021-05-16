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

    //Retorna la vista amb una llista dels productes del organitzador
    public function productsOrganizer(){
        return view('organizerzone.products', [
            'products' => Product::where('organizer_id', auth()->user()->organizer->id)->get()
        ]);
    }

    //Retorna la vista del formulari de cració de productes
    public function create(){
        return view('products.create');
    }


    //Guardar el producte, la imatge i les talles
    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:50',
            'description'   => 'required',
            'price'         => 'required',
            'img'    => 'required',
        ]);
        //Guardar Producte
        $product = Product::create([
            'organizer_id'  => auth()->user()->organizer->id,
            'name'          => $request->name,
            'description'   => $request->description,
            'link_photo'    => $request->img,
            'price'         => $request->price,
            'size_id'       => 1,
        ]);
        
        Storage::disk('public')->put('products/'. $request->img, $request->file('img'));

        //Guardar Imatge
        // if ($request->file('img')) {
        //     $product->link_photo = $request->file('img')->store('products', 'public');
        //     $product->save();
        // }
        
        //Retornar
        return back()->with('status', 'Producte creat amb èxit');
    }

    //Retorna la vista per actualitzar un producte
    public function edit(Product $product) {  
        return view('products.edit', compact('product'));
    }

    //Actualitzar un producte
    public function update(Request $request, Product $product){

        $request->validate([
            'name'          => 'required|max:50',
            'description'   => 'required',
            'price'         => 'required',
            'img'           => 'required',
        ]);
        //Actualitzar les dades
        $product->update($request->all());

        if ($request->file('img')) {
            //Eliminar la imatge anterior per actualitzar la nova.
            Storage::disk('public')->delete($product->img_cover);
            $product->link_photo = $request->file('img')->store('products', 'public');
            $product->save();
        }

        return back()->with('status', 'Producte actualitzat amb èxit');
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

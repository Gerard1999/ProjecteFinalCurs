<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Size;
use Auth;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function products(){
        return view('products', [
            'products' => Product::where('validate', 1)->get()
        ]);
    }

    public function product(Product $product){
        if(Auth::check() && auth()->user()->user_type == "superadmin") {
            return view('product', ['product' => $product]);
        } else {
            if($product->validate) {
                return view('product', ['product' => $product]);
            }
        }
        return back();
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
        $size = Size::create([
            'xs'    => $request->xs,
            's'     => $request->s,
            'm'     => $request->m,
            'l'     => $request->l,
            'xl'    => $request->xl,
            'xxl'   => $request->xxl,
        ]);
        
        $request->validate([
            'name'          => 'required|max:50',
            'description'   => 'required',
            'price'         => 'required',
            'img'           => 'required',
        ]);
        //Guardar Producte
        $product = Product::create([
            'organizer_id'  => auth()->user()->organizer->id,
            'name'          => $request->name,
            'description'   => $request->description,
            'link_photo'    => $request->img,
            'price'         => $request->price,
            'size_id'       => $size->id,
        ]);
        
        //Guardar Imatge
        if ($request->file('img')) {
            $product->link_photo = $request->file('img')->store('products', 'public');
        }
        $product->save();
        
        //Retornar
        return back()->with('status', "Producte creat amb èxit. Pendent de validació per part de l'administració");
    }

    //Retorna la vista per actualitzar un producte
    public function edit(Product $product) {  
        return view('products.edit', compact('product'));
    }

    //Actualitzar un producte
    public function update(Request $request, Product $product){

        //Validem
        $request->validate([
            'name'          => 'required|max:50',
            'description'   => 'required',
            'price'         => 'required',
            'img'           => 'required',
        ]);
        //Actualitzar les dades del producte en si
        $product->organizer_id  = auth()->user()->organizer->id;
        $product->name          = $request->name;
        $product->description   = $request->description;
        $product->link_photo    = 'products/'.$request->img;
        $product->price         = $request->price;
        $product->size_id       = $request->size_id;
        $product->validate      = 0;
        $product->update();
        
        //Busquem les talles per l'id i les modifiquem
        $size = Size::where('id', $request->size_id)->first();
        $size->xs      = $request->xs;
        $size->s       = $request->s;
        $size->m       = $request->m;
        $size->l       = $request->l;
        $size->xl      = $request->xl;
        $size->xxl     = $request->xxl;
        $size->update();

        // dd($request->file('img'));
        if ($request->hasFile('img')) {
            dd("te foto");
            //Eliminar la imatge anterior per actualitzar la nova.
            // Storage::disk('public')->delete($product->img_cover);
            $product->link_photo = $request->file('img')->store('products', 'public');
            $product->update();
        }

        return back()->with('status', "Producte actualitzat amb èxit. Pendent de validació per part de l'administració");
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

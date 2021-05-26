<?php

namespace App\Http\Controllers;

use App\SuperAdmin;
use App\Race;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class SuperAdminController extends Controller
{
    //Retorna la vista d'administració del SuperAdmin
    public function superadminzone(){
        return view('superadmin.index');
    }

    //Retorna uan cursa encara que no estigui validada (serveix perque el superadmin pugui revisar totes les dades)
    public function allRace(Race $race){
        return view('race', ['race' => $race]);
    }


    //Retorna les curses que no estiguin validades
    public function notValidateRaces() {
        return view('superadmin.notvalidateraces', [
            'races' => Race::where('validate', 0)->get()
        ]);
    }

    //Retorna els productes que no estiguin validats
    public function notValidateProducts() {
        return view('superadmin.notvalidateproducts', [
            'products' => Product::where('validate', 0)->get()
        ]);
    }

    //Funció que valida un producte
    public function validarProducte($idProducte) {
        $product = Product::where('id',$idProducte)->first();
        $product->validate = 1;
        $product->save();
        if ($product->validate) {
            return back()->with('status', 'Producte validat correctament');
        }
        return back()->with('status', 'Hi ha hagut un error');
    }

    //Funció que valida una cursa
    public function validarCursa($idCursa) {
        $cursa = Race::where('id',$idCursa)->first();
        $cursa->validate = 1;
        $cursa->save();
        if ($cursa->validate) {
            return back()->with('status', 'Cursa validada correctament');
        }
        return back()->with('status', 'Hi ha hagut un error');
    }
    
    //Retorna totes les curses
    public function allRaces() {
        return view('superadmin.allraces', [
            'races' => Race::get()
        ]);
    }
    
    //Retorna tots els productes
    public function allProducts() {
        return view('superadmin.allproducts', [
            'products' => Product::get()
        ]);
    }

    //Retorna tots els Corredors
    public function allRunners() {
        return view('superadmin.allrunners', [
            'runners' => User::where('user_type', 'runner')->get()
        ]);
    }
    
    //Retorna tots els Organitzadors
    public function allOrganizers() {
        return view('superadmin.allorganizers', [
            'organizers' => User::where('user_type', 'organizer')->get()
        ]);
    }
}

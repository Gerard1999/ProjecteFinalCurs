<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\RunnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InscriptionsListController;
use App\Http\Controllers\ShoppingCartDetailController;
use App\Http\Controllers\Backend\RaceController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [PageController::class, 'races'])->name('races');
Route::get('curses/{race}', [PageController::class, 'race'])->name('race');

Route::get('products', [ProductController::class, 'products'])->name('products');
Route::get('products/{product}', [ProductController::class, 'product'])->name('product');

Auth::routes();

Route::resource('shoppingCartDetail', 'ShoppingCartDetailController')->only([
        'update', 'destroy'
])->names('shopping_cart_details');
Route::post('/afegir-producte-carro', [ShoppingCartDetailController::class, 'store'])->name('addproduct');

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rutes dels corredors
Route::group([
        'prefix' => 'runner',
        'as' => 'runner.',
        'namespace' => 'Runner',
        'middleware' => ['auth','runner']    
], function() {
        //Zona privada
        Route::get('/privatezone', [RunnerController::class, 'privatezone'])->name('privatezone');

        //Inscripccions
        Route::get('/inscripcio/{race}', [InscriptionsListController::class, 'create'])->name('inscripcio');
        Route::post('/guardar-inscripcio', [InscriptionsListController::class, 'store'])->name('guardarinscripcio');

        //Curses Corredor
        Route::get('/futures-curses', [InscriptionsListController::class, 'viewFutureRaces'])->name('view-future-races');
        Route::get('/curses-realitzades', [InscriptionsListController::class, 'viewPassedRaces'])->name('view-passed-races');
});

//Rutes dels organitzadors
Route::group([
        'prefix' => 'organizer',
        'as' => 'organizer.',
        'namespace' => 'Backend',
        'middleware' => ['auth','admin']    
], function() {
        Route::get('/les-meves-curses', [RaceController::class, 'index'])->name('cursesorganitzador');
        Route::get('/crear-cursa', [RaceController::class, 'create'])->name('crearcursa');
        Route::get('/editar-cursa/{race}', [RaceController::class, 'edit'])->name('editarcursa');
        Route::post('/guardar-cursa', [RaceController::class, 'store'])->name('guardarcursa');
        Route::post('/reguardar-cursa/{race}', [RaceController::class, 'update'])->name('reguardarcursa');
        Route::delete('/eliminar-cursa/{id}', [RaceController::class, 'destroy'])->name('eliminarcursa');
        
        Route::get('/organizerzone', [OrganizerController::class, 'organizerzone'])->name('organizerzone');
        Route::get('/productes', [ProductController::class, 'productsOrganizer'])->name('productes');
        Route::get('/crear-producte', [ProductController::class, 'create'])->name('crearproducte');
        Route::post('/guardar-producte', [ProductController::class, 'store'])->name('guardarproducte');
        Route::get('/editar-producte/{product}', [ProductController::class, 'edit'])->name('editarproducte');
        Route::post('/reguardar-producte', [ProductController::class, 'update'])->name('reguardarproducte');
        Route::delete('/eliminar-producte/{id}', [ProductController::class, 'destroy'])->name('eliminarproducte');
        
        Route::get('/llista-corredors/{race}', [InscriptionsListController::class, 'getRunnersRace'])->name('veure-corredors');

});



Route::get('organizers/register', [OrganizerController::class, 'showRegisterForm'])->name('registerorganizer');
/*Route::get('/users', 'UserController@index');*/

Route::post('/register-runner', [UserController::class,'storeRunner'])->name('users.storeRunner');
Route::post('/register-organizer', [UserController::class,'storeOrganizer'])->name('users.storeOrganizer');
/*Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');*/
//use App\User;
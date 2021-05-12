<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizerController;
use App\Http\Controllers\RunnerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InscriptionsListController;
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

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Rutes dels corredors
Route::group([
        'prefix' => 'runner',
        'as' => 'runner.',
        'namespace' => 'Runner',
        'middleware' => ['auth','runner']    
], function() {
        Route::get('/privatezone', [RunnerController::class, 'privatezone'])->name('privatezone');
        Route::get('/inscripcio/{race}', [InscriptionsListController::class, 'create'])->name('inscripcio');
        Route::post('/guardar-inscripcio', [InscriptionsListController::class, 'store'])->name('guardarinscripcio');
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
        Route::get('/editar-cursa', [RaceController::class, 'edit'])->name('editarcursa');
        Route::post('/guardar-cursa', [RaceController::class, 'store'])->name('guardarcursa');
        Route::post('/reguardar-cursa', [RaceController::class, 'update'])->name('reguardarcursa');
        Route::get('/eliminar-cursa', [RaceController::class, 'destroy'])->name('eliminarcursa');
        //Route::resource('races', 'RaceController')->except('show');
        Route::get('/organizerzone', [OrganizerController::class, 'organizerzone'])->name('organizerzone');
        Route::get('/prodcutes', [OrganizerController::class, 'products'])->name('productes');
});



Route::get('organizers/register', [OrganizerController::class, 'showRegisterForm'])->name('registerorganizer');
/*Route::get('/users', 'UserController@index');*/

Route::post('/register-runner', [UserController::class,'storeRunner'])->name('users.storeRunner');
Route::post('/register-organizer', [UserController::class,'storeOrganizer'])->name('users.storeOrganizer');
/*Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');*/
//use App\User;
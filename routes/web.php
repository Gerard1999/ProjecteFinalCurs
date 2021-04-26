<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrganizerController;
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

Route::get('/', [PageController::class, 'races']);
Route::get('curses/{race}', [PageController::class, 'race'])->name('race');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('races', 'Backend\RaceController')
        ->middleware('auth')
        ->middleware('admin')
        ->except('show');

Route::get('organizers/register', [OrganizerController::class, 'showRegisterForm'])->name('registerorganizer');
/*Route::get('/users', 'UserController@index');*/
Route::post('/registerRunner', [UserController::class,'storeRunner'])->name('users.storeRunner');
/*Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');*/
//use App\User;
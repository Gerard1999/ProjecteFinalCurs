<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', 'PageController@races');
Route::get('curses/{race}', 'PageController@race')->name('race');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('races', 'Backend\RaceController')
        ->middleware('auth')
        ->except('show');

/*Route::get('/users', 'UserController@index');
Route::post('users', 'UserController@store')->name('users.store');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');*/
//use App\User;
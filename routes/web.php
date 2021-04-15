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

/*Route::get('/', function(){
    return view('home');
});*/

Route::get('/', 'PageController@races');
Route::get('curses/{race}', 'PageController@race')->name('race');



Route::get('/users', 'UserController@index');
Route::post('users', 'UserController@store')->name('users.store');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
use App\User;

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



use App\Race;
Route::get('races', function(){
    $races = Race::get();

    foreach ($races as $race) {
        echo "<p>
                $race->id |
                <strong>{$race->shirt}</strong> |
                $race->name
                </p>";
    }
});
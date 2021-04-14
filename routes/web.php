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
});

/*Route::get('/users', 'UserController@index');
Route::post('users', 'UserController@store')->name('users.store');
Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy');
*/

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

use App\Race;

Route::get('eloquent', function(){
    $races = Race::where('name', '>=', '20')
        ->orderBy('id','desc')
        ->take(3)
        ->get();

    foreach ($races as $race) {
        echo "<h3>$race->id $race->name </h3>";
    }
});

Route::get('races', function(){
    $races = Race::get();

    foreach ($races as $race) {
        echo "<p>
                $race->id |
                <strong>{$race->user->name}</strong> |
                $race->name
                </p>";
    }
});

use App\User;

Route::get('users', function(){
    $users = User::all();

    foreach ($users as $user) {
        echo "<p>
                $user->id |
                $user->name |
                <strong>{$user->races->count()} races</strong>
                </p>";
    }
});
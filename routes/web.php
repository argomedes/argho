<?php

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

Route::get('/', function () {
    return view('welcome');
});

//
Auth::routes();

Route::get('/home', 'HomeController@index');
//

// Zlot samochodowy
Route::get('/zloty', 'CarRallyController@index');
Route::get('/zloty/utworz', 'CarRallyController@create')->middleware('guest');
Route::get('/zloty/{carRally}', 'CarRallyController@show')->name('zlot');
Route::post('/zloty', 'CarRallyController@store');

// Dashboard
Route::get('/zloty/{carRally}/dashboard', 'CarRallyController@dashboard')->middleware(['auth', '\App\Http\Middleware\UserRelatedWithCarRally']);


Route::get('/zloty/{carRally}/login', 'SessionController@create');
Route::post('/zloty/{carRally}/login', 'SessionController@store');
Route::get('/zloty/{carRally}/logout', 'SessionController@destroy');

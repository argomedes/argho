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

// Route::get('/home/zloty', 'CarRallyController@index');

Route::get('/zloty', 'CarRallyController@index');
Route::get('/zloty/utworz', 'CarRallyController@create');
Route::get('/zloty/{carRally}', 'CarRallyController@show');
Route::post('/zloty', 'CarRallyController@store');

Route::get('/zloty/{carRally}/dashboard', 'CarRallyController@dashboard')->middleware(['\App\Http\Middleware\UserRelatedWithCarRally']);

// Route::get('/{carRally}', 'CarRallyController@show');

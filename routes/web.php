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
Route::get('/zloty', 'CarRallyController@index'); //TODO
Route::get('/zloty/{carRally}', 'CarRallyController@show')->name('zlot');

Route::get('/utworz-zlot', 'CarRallyController@create')->middleware('guest')->name('utworz-zlot');
Route::post('/utworz-zlot', 'CarRallyController@store');

// Route::get('{carRally}/informacje',   'CarRallyController@info'); //TODO
Route::get('{carRally}/informacje', 'CarRallyInfoController@show');
Route::get('{carRally}/regulamin', 'CarRallyRulesController@show');
Route::get('{carRally}/rejestracja', 'RegistrationController@create');
Route::post('{carRally}/rejestracja', 'RegistrationController@store');
//

// Logowanie
Route::get('{carRally}/logowanie', 'SessionController@create')->name('login');
Route::post('{carRally}/logowanie', 'SessionController@store');
Route::get('{carRally}/wyloguj', 'SessionController@destroy')->name('wylogowanie');
//


Route::group(['middleware' => ['auth', '\App\Http\Middleware\UserRelatedWithCarRally']], function () {
    Route::get('{carRally}/panel', 'CarRallyController@dashboard')->name('dashboard');
    Route::get('{carRally}/panel/edytuj-zlot', 'CarRallyController@edit')->name('edytuj-zlot');
    Route::put('{carRally}/panel/edytuj-zlot', 'CarRallyController@update')->name('aktualizuj-zlot');

    // Route::resource('{carRally}/panel/info', 'CarRallyInfoController');
    Route::get('{carRally}/panel/informacje', 'CarRallyInfoController@edit')->name('panel.informacje.edit');
    Route::put('{carRally}/panel/informacje', 'CarRallyInfoController@update')->name('panel.informacje.update');

    Route::get('{carRally}/panel/regulamin', 'CarRallyRulesController@edit')->name('panel.regulamin.edit');
    Route::put('{carRally}/panel/regulamin', 'CarRallyRulesController@update')->name('panel.regulamin.update');


    Route::get('{carRally}/posts', 'PostController@dashboardIndex'); //
    Route::get('{carRally}/posts/add', 'PostController@create');
    Route::get('{carRally}/posts/{post}', 'PostController@dashboardShow');
    Route::post('{carRally}/posts', 'PostController@store');
});
// Posts

Route::get('{carRally}/', 'PostController@index')->name('zlot.index');
Route::get('{carRally}/posts/{post}', 'PostController@show')->middleware('guest');
Route::get('{carRally}/posts/{post}', 'PostController@show')->middleware('guest');

Route::get('{carRally}/kontakt', 'ContactController@index');
// Route::get('{carRally}/rejestracja', 'CrewRegisterController@index'); // TODO

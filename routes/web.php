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
// TODO trzeba id podpiac
// Route::get('{carRally}/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
// Route::post('{carRally}/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
// Route::get('{carRally}/password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
// Route::post('{carRally}/password/reset', 'Auth\ResetPasswordController@reset');
// koniec TODO
Route::get('/home', 'HomeController@index');
//

// Zlot samochodowy
Route::get('/zloty', 'CarRallyController@index'); //TODO
Route::get('/zloty/{carRally}', 'CarRallyController@show')->name('zlot');

Route::get('/utworz-zlot', 'CarRallyController@create')->middleware('guest')->name('utworz-zlot');
Route::post('/utworz-zlot', 'CarRallyController@store')->name('utworz-zlot.store');

Route::get('{carRally}/informacje', 'CarRallyInfoController@show');
Route::get('{carRally}/regulamin', 'CarRallyRulesController@show');
Route::get('{carRally}/rejestracja', 'RegistrationController@create');
Route::post('{carRally}/rejestracja', 'RegistrationController@store');
//
Route::get('{carRally}/kontakt', 'QuestionCotroller@create')->name('questions.create');
Route::post('{carRally}/kontakt', 'QuestionCotroller@store')->name('questions.store');

// Logowanie
Route::get('{carRally}/logowanie', 'SessionController@create')->name('login');
Route::post('{carRally}/logowanie', 'SessionController@store');
Route::get('{carRally}/wyloguj', 'SessionController@destroy')->name('wylogowanie');
//


Route::group(['middleware' => ['auth', '\App\Http\Middleware\UserRelatedWithCarRally']], function () {
    Route::get('{carRally}/panel', 'CarRallyController@dashboardShow')->name('dashboard');
    Route::get('{carRally}/panel/zlot', 'CarRallyController@edit')->name('edytuj-zlot');
    Route::put('{carRally}/panel/zlot', 'CarRallyController@update')->name('aktualizuj-zlot');

    Route::get('{carRally}/panel/informacje', 'CarRallyInfoController@edit')->name('panel.informacje.edit');
    Route::put('{carRally}/panel/informacje', 'CarRallyInfoController@update')->name('panel.informacje.update');

    Route::get('{carRally}/panel/regulamin', 'CarRallyRulesController@edit')->name('panel.regulamin.edit');
    Route::put('{carRally}/panel/regulamin', 'CarRallyRulesController@update')->name('panel.regulamin.update');

    // Wpisy
    Route::get('{carRally}/panel/wpisy', 'PostController@dashboardIndex')->name('dashboard.posts.index'); //
    Route::get('{carRally}/panel/wpisy/dodaj', 'PostController@create')->name('dashboard.posts.create');
    Route::get('{carRally}/panel/wpisy/{post}', 'PostController@dashboardShow')->name('dashboard.posts.show');
    Route::get('{carRally}/panel/wpisy/{post}/edytuj', 'PostController@edit')->name('dashboard.posts.edit');
    Route::put('{carRally}/panel/wpisy/{post}/edytuj', 'PostController@update')->name('dashboard.posts.update');
    Route::get('{carRally}/panel/wpisy/{post}/usun', 'PostController@destroy')->name('dashboard.posts.destroy');
    Route::post('{carRally}/panel/wpisy', 'PostController@store')->name('dashboard.posts.store');

    // Notatki
    Route::get('{carRally}/panel/notatki', 'NoteController@index')->name('dashboard.notes.index');
    Route::get('{carRally}/panel/notatki/dodaj', 'NoteController@create')->name('dashboard.notes.create');
    Route::get('{carRally}/panel/notatki/{note}', 'NoteController@show')->name('dashboard.notes.show');
    Route::get('{carRally}/panel/notatki/{note}/edytuj', 'NoteController@edit')->name('dashboard.notes.edit');
    Route::put('{carRally}/panel/notatki/{note}/edytuj', 'NoteController@update')->name('dashboard.notes.update');
    Route::get('{carRally}/panel/notatki/{note}/usun', 'NoteController@destroy')->name('dashboard.notes.destroy');
    Route::post('{carRally}/panel/notatki', 'NoteController@store')->name('dashboard.notes.store');

    Route::get('{carRally}/panel/zgloszenia', 'RegistrationController@index')->name('dashboard.registrations.index');
    Route::get('{carRally}/panel/zgloszenia/{registration}', 'RegistrationController@show')->name('dashboard.registrations.show');
    Route::get('{carRally}/panel/zgloszenia/{registration}/edytuj', 'RegistrationController@edit')->name('dashboard.registrations.edit');
    Route::put('{carRally}/panel/zgloszenia/{registration}/edytuj', 'RegistrationController@update')->name('dashboard.registrations.update');
    Route::get('{carRally}/panel/zgloszenia/{registration}/usun', 'RegistrationController@destroy')->name('dashboard.registrations.destroy');

    Route::get('{carRally}/panel/zapytania', 'QuestionCotroller@index')->name('dashboard.questions.index');
    Route::get('{carRally}/panel/zapytania/{question}', 'QuestionCotroller@show')->name('dashboard.questions.show');
    Route::get('{carRally}/panel/zapytania/{question}/usun', 'QuestionCotroller@destroy')->name('dashboard.questions.destroy');
});
// Posts

Route::get('{carRally}/', 'PostController@index')->name('zlot.index');
Route::get('{carRally}/wpisy/{post}', 'PostController@show')->name('posts.show');

// Route::get('{carRally}/rejestracja', 'CrewRegisterController@index'); // TODO

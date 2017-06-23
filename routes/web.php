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

Route::group(['middleware' => ['guest']], function () {
    // TODO trzeba id podpiac
    Route::get('{carRally}/password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('{carRally}/password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.reset.perform');
    // koniec TODO
});
// Auth::routes();

Route::get('administrator/logowanie', 'SessionController@adminCreate')->name('admin.login');
Route::post('administrator/logowanie', 'SessionController@adminStore');

Route::get('weryfikacja/{activationToken}', [
    'as' => 'confirmation_path',
    'uses' => 'Auth\RegisterController@confirm'
]);


Route::get('{carRally}/logowanie', 'SessionController@create')->name('login');
Route::post('{carRally}/logowanie', 'SessionController@store');
// Route::get('{carRally}/wyloguj', 'SessionController@destroy')->name('logout');
Route::post('/wyloguj', 'SessionController@destroy')->name('logout');

//

Route::get('/home', 'HomeController@index');
//
// Logowanie

// Rejestracja
Route::get('/utworz-zlot', 'CarRallyController@create')->middleware('guest')->name('utworz-zlot');
Route::post('/utworz-zlot', 'CarRallyController@store')->middleware('guest')->name('utworz-zlot.store');

// Strona główna
Route::get('/', function () {
    return view('welcome');
})->name('homepage');

Route::get('/logowanie/krok-1', 'SessionController@stepOne')->name('login.step-one');

// Informacje i regulamin
Route::get('{carRally}/informacje', 'CarRallyInfoController@show');
Route::get('{carRally}/regulamin', 'CarRallyRulesController@show');

// Zapisz się
Route::get('{carRally}/rejestracja', 'RegistrationController@create');
Route::post('{carRally}/rejestracja', 'RegistrationController@store');

// Zadaj pytanie
Route::get('{carRally}/kontakt', 'QuestionController@create')->name('questions.create');
Route::post('{carRally}/kontakt', 'QuestionController@store')->name('questions.store');


Route::group(['middleware' => ['auth', '\App\Http\Middleware\UserIsAdmin']], function () {
    Route::get('/administrator', 'CarRallyController@adminPanelShow')->name('admin.dashboard');

    Route::get('administrator/zloty', 'CarRallyController@index')->name('admin.car-rally.index');
    Route::get('administrator/zloty/{carRally}', 'CarRallyController@adminShow')->name('admin.car-rally.show');
    Route::get('administrator/zloty/{carRally}/edytuj', 'CarRallyController@adminEdit')->name('admin.car-rally.edit');
    Route::put('administrator/zloty/{carRally}/edytuj', 'CarRallyController@adminUpdate')->name('admin.car-rally.update');
    Route::put('administrator/zloty/{carRally}/block', 'CarRallyController@block')->name('admin.car-rally.block');

    Route::get('administrator/wpisy', 'PostController@adminIndex')->name('admin.posts.index');
    Route::get('administrator/wpisy/{post}', 'PostController@adminShow')->name('admin.posts.show');
    Route::get('administrator/wpisy/{post}/edytuj', 'PostController@adminEdit')->name('admin.posts.edit');
    Route::put('administrator/wpisy/{post}/edytuj', 'PostController@adminUpdate')->name('admin.posts.update');
    Route::delete('administrator/wpisy/{post}/usun', 'PostController@adminDestroy')->name('admin.posts.destroy');


    Route::get('administrator/zgloszenia', 'RegistrationController@adminIndex')->name('admin.registrations.index');
    Route::get('administrator/zgloszenia/{registration}', 'RegistrationController@adminShow')->name('admin.registrations.show');
    Route::get('administrator/zgloszenia/{registration}/edytuj', 'RegistrationController@adminEdit')->name('admin.registrations.edit');
    Route::put('administrator/zgloszenia/{registration}/edytuj', 'RegistrationController@adminUpdate')->name('admin.registrations.update');
    Route::delete('administrator/zgloszenia/{registration}/usun', 'RegistrationController@adminDestroy')->name('admin.registrations.destroy');

    Route::get('administrator/zapytania', 'QuestionController@adminIndex')->name('admin.questions.index');
    Route::get('administrator/zapytania/{question}', 'QuestionController@adminShow')->name('admin.questions.show');
    Route::get('administrator/zapytania/{question}/edytuj', 'QuestionController@adminEdit')->name('admin.questions.edit');
    Route::put('administrator/zapytania/{question}/edytuj', 'QuestionController@adminUpdate')->name('admin.questions.update');
    Route::delete('administrator/zapytania/{question}/usun', 'QuestionController@adminDestroy')->name('admin.questions.destroy');

    Route::get('administrator/notatki', 'NoteController@adminIndex')->name('admin.notes.index');
    Route::get('administrator/notatki/{note}', 'NoteController@adminShow')->name('admin.notes.show');
    Route::get('administrator/notatki/{note}/edytuj', 'NoteController@adminEdit')->name('admin.notes.edit');
    Route::put('administrator/notatki/{note}/edytuj', 'NoteController@adminUpdate')->name('admin.notes.update');
    Route::delete('administrator/notatki/{note}/usun', 'NoteController@adminDestroy')->name('admin.notes.destroy');

    Route::get('administrator/uzytkownicy', 'UserController@adminIndex')->name('admin.users.index');
    Route::get('administrator/uzytkownicy/{user}', 'UserController@adminShow')->name('admin.users.show');
    Route::get('administrator/uzytkownicy/{user}/edytuj', 'UserController@adminEdit')->name('admin.users.edit');
    Route::put('administrator/uzytkownicy/{user}/edytuj', 'UserController@adminUpdate')->name('admin.users.update');
    Route::get('administrator/uzytkownicy/dodaj', 'UserController@adminCreate')->name('admin.users.create');
    Route::post('administrator/uzytkownicy/dodaj', 'UserController@adminStore')->name('admin.users.store');


});

// Aktualności
Route::get('{carRally}/', 'PostController@index')->name('zlot.index');
Route::get('{carRally}/wpisy/{post}', 'PostController@show')->name('posts.show');


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
    Route::delete('{carRally}/panel/notatki/{note}/usun', 'NoteController@destroy')->name('dashboard.notes.destroy');
    Route::post('{carRally}/panel/notatki', 'NoteController@store')->name('dashboard.notes.store');

    Route::get('{carRally}/panel/zgloszenia', 'RegistrationController@index')->name('dashboard.registrations.index');
    Route::get('{carRally}/panel/zgloszenia/{registration}', 'RegistrationController@show')->name('dashboard.registrations.show');
    Route::get('{carRally}/panel/zgloszenia/{registration}/edytuj', 'RegistrationController@edit')->name('dashboard.registrations.edit');
    Route::put('{carRally}/panel/zgloszenia/{registration}/edytuj', 'RegistrationController@update')->name('dashboard.registrations.update');
    Route::get('{carRally}/panel/zgloszenia/{registration}/usun', 'RegistrationController@destroy')->name('dashboard.registrations.destroy');

    Route::get('{carRally}/panel/zapytania', 'QuestionController@index')->name('dashboard.questions.index');
    Route::get('{carRally}/panel/zapytania/{question}', 'QuestionController@show')->name('dashboard.questions.show');
    Route::get('{carRally}/panel/zapytania/{question}/usun', 'QuestionController@destroy')->name('dashboard.questions.destroy');
});

Route::group(['middleware' => ['auth', '\App\Http\Middleware\UserIsCreator']], function () {
    Route::get('{carRally}/panel/organizatorzy', 'UserController@index')->name('dashboard.users.index');
    Route::get('{carRally}/panel/organizatorzy/dodaj', 'UserController@create')->name('dashboard.users.create');
    Route::post('{carRally}/panel/organizatorzy/dodaj', 'UserController@store')->name('dashboard.users.store');
    Route::get('{carRally}/panel/organizatorzy/{user}', 'UserController@show')->name('dashboard.users.show');
    Route::get('{carRally}/panel/organizatorzy/{user}/edytuj', 'UserController@edit')->name('dashboard.users.edit');
    Route::put('{carRally}/panel/organizatorzy/{user}/edytuj', 'UserController@update')->name('dashboard.users.update');
    Route::put('{carRally}/panel/organizatorzy/{user}/block', 'UserController@block')->name('dashboard.users.block');
});

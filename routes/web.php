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
    return view('layouts.navegacion');
});

Route::get('intl', 'IntlController@index');
Route::get('intl/torneo/{id}', 'IntlTorneoController@show');
Route::get('intl/torneo/{id}/equipos', 'IntlTorneoController@equipos');
Route::get('intl/torneo/{id}/posiciones', 'IntlTorneoController@posiciones');
Route::get('intl/torneo/{id}/partidos', 'IntlTorneoController@partidos');

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
Route::get('intl/torneo/{id}', 'IntlController@show');
Route::get('intl/torneo/{id}/equipos', 'IntlController@equipos');
Route::get('intl/torneo/{id}/posiciones', 'IntlController@posiciones');
Route::get('intl/torneo/{id}/partidos', 'IntlController@partidos');
Route::get('intl/torneo/{id}/resultados', 'IntlController@resultados');

Route::get('eu','EuropeController@index');
Route::get('eu/torneo/{id}', 'EuropeController@show');
Route::get('eu/torneo/{id}/equipos', 'EuropeController@equipos');
Route::get('eu/torneo/{id}/posiciones', 'EuropeController@posiciones');
Route::get('eu/torneo/{id}/partidos', 'EuropeController@partidos');
Route::get('eu/torneo/{id}/resultados', 'EuropeController@resultados');

Route::get('am','AmericaController@index');
Route::get('am/torneo/{id}', 'AmericaController@show');
Route::get('am/torneo/{id}/equipos', 'AmericaController@equipos');

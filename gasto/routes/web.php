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


Route::get('/inicio', function () {
    return view('layouts.admin');
});



Route::resource('gasto/gastofijo','GastofijoController');
Route::resource('gasto/gastovariable','GastovariableController');

Route::resource('ingreso/ingreso','IngresoController');


Route::resource('contacto','ContactoController');


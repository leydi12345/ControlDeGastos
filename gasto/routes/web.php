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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');


Route::get('/refresh_captcha','Auth\RegisterController@refreshCaptcha')->name('refresh');


Route::get('login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('login/facebook/callback', 'Auth\LoginController@handleProviderCallback');

Route::get('login/twitter', 'Auth\TwitterController@redirectToProvider');
Route::get('login/twitter/callback1', 'Auth\TwitterController@handleProviderCallback');

Route::get('login/Instagram', 'Auth\InstagramController@redirectToProvider');
Route::get('login/Instagram/callback2', 'Auth\InstagramController@handleProviderCallback');


Route::get('login/google', 'Auth\GoogleController@redirectToProvider');
Route::get('login/google/callback3', 'Auth\GoogleController@handleProviderCallback');

Route::get('/redirect','SocialController@redirect');

Route::get('/callback','SocialController@callback');


Route::get('/redirect1','SocialController@redirect1');

Route::get('/callback1','SocialController@callback1');


Route::get('/redirect2','SocialController@redirect2');

Route::get('/callback2','SocialController@callback2');


Route::get('/redirect3','SocialController@redirect3');

Route::get('/callback3','SocialController@callback3');

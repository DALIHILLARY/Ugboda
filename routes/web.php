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

Route::post('africaistalkingussd','UssdController@index');

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('riders', 'RiderController');

Route::resource('phones', 'PhoneController');

Route::resource('menus', 'MenuController');

Route::resource('submenus', 'SubmenuController');

Route::resource('reports', 'ReportController');

Route::resource('logs', 'LogController');

Auth::routes();

Route::get('/home', 'HomeController@index');


Auth::routes();

Route::get('/home', 'HomeController@index');
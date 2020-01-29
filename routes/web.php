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

use App\Http\Controllers\mapsController;

Route::get('/', function () {
    return view('welcome');
});

Route::post('africaistalkingussd','UssdController@index');


Auth::routes();


Route::get('/home', 'mapsController@index');

Route::resource('mapsx','cycuvvc@index');

Route::resource('riders', 'RiderController');

Route::resource('phones', 'PhoneController');

Route::resource('reports', 'ReportController');

Route::resource('logs', 'LogController');

Route::resource('districts', 'DistrictController');

Route::resource('bodas', 'BodaController');

Route::resource('charts', 'RiderChartController');



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
    return view('home.index');
});

/**
 * Sectors
 */
Route::resource('sectors', 'SectorController');
Route::get('/sectors/{id}/delete', 'SectorController@destroy');

/**
 * Softwares
 */
Route::resource('softwares', 'SoftwareController');
Route::get('/softwares/{id}/delete', 'SoftwareController@destroy');

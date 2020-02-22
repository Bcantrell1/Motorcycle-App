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

Route::get('/', function() {
    return view('bikes.index');
});

Route::resource('bikes', 'BikeController');

Route::get('/bikes', 'BikeController@index');

Route::get('/create', 'BikeController@create');
Route::post('/create', 'BikeController@store');

// Route::get('/update', 'BikeController@edit');
// Route::get('/update', 'BikeController@update');

// Route::post('/delete', 'BikeController@destroy');
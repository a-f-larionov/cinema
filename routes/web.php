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

Route::get('/shows', 'ShowsController@shows');

Route::get('/shows/{id}/events', 'EventsController@events');

Route::get('/events/{id}/places', 'PlacesController@places');

Route::post('/api/place/reserve', 'ApiPlacesController@reserve');

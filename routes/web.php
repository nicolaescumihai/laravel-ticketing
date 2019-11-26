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

Auth::routes();

// Route::resource('passanger', 'PassangerController');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('passanger/create', 'PassangerController@create');

Route::get('passanger', 'PassangerController@index');

Route::post('passanger', 'PassangerController@store' )->name('passanger');

Route::get('passanger/{passanger}','PassangerController@show');

Route::get('passanger/{passanger}/edit','PassangerController@edit');

Route::get('passanger/{passanger}/destroy','PassangerController@destroy');

Route::post('update/{id}', 'PassangerController@update')->name('update_passanger');

Route::get('airport/create', 'AirportController@create');

Route::get('airport', 'AirportController@index');

Route::post('airport', 'AirportController@store' )->name('airport');

Route::get('airport/{airport}','AirportController@show');

Route::get('airport/{airport}/edit','AirportController@edit');

Route::get('airport/{airport}/destroy','AirportController@destroy');

Route::post('update/{id}', 'AirportController@update')->name('update_airport');

Route::get('plane/create', 'PlaneController@create');

Route::get('plane', 'PlaneController@index');

Route::post('plane', 'PlaneController@store' )->name('plane');

Route::get('plane/{plane}','PlaneController@show');

Route::get('plane/{plane}/edit','PlaneController@edit');

Route::get('plane/{airport}/destroy','PlaneController@destroy');

Route::post('update/{id}', 'PlaneController@update')->name('update_plane');

Route::get('ticket/create', 'TicketController@create');

Route::get('ticket', 'TicketController@index');

Route::post('ticket', 'TicketController@store' )->name('ticket');

Route::get('ticket/{ticket}','TicketController@show');

Route::get('ticket/{ticket}/edit','TicketController@edit');

Route::get('ticket/{airport}/destroy','TicketController@destroy');

Route::post('update/{id}', 'TicketController@update')->name('update_ticket');


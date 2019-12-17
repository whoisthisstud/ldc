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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/states', 'StateController@index')->name('states.index');
Route::get('/states/add', 'StateController@create')->name('states.create');
Route::post('/states/create', 'StateController@store')->name('states.store');
Route::get('/states/{state}', 'StateController@show')->name('states.view');

Route::get('/cities/add', 'CityController@create')->name('cities.create');
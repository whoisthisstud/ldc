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

// Route::get('/', function () {
//     return view('public');
// });

Route::get('/', 'PagesController@index')->name('public.index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/states', 'StateController@index')->name('states.index');
Route::get('/states/add', 'StateController@create')->name('states.create');
Route::post('/states/store', 'StateController@store')->name('states.store');
Route::get('/states/{state}', 'StateController@show')->name('view.state');

Route::get('/city/{city}', 'CityController@index')->name('view.city');
Route::get('/states/{state}/add-city', 'CityController@create')->name('cities.create');
Route::post('/states/{state}/store-city', 'CityController@store')->name('cities.store');

Route::get('/businesses', 'BusinessController@index')->name('businesses.index');
Route::get('/businesses/add', 'BusinessController@create')->name('businesses.create');
Route::post('/businesses/store', 'BusinessController@store')->name('businesses.store');
Route::get('/businesses/{business}', 'BusinessController@show')->name('view.business');






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

// Route::group(['prefix' => 'admin'], function () {
// })->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/admin/dashboard', 'HomeController@index')->name('home');
    Route::get('/admin/test', 'TestController')->name('test');
    // Route::get('/admin/test', function(){ return view('test'); })->name('test');

    Route::get('/admin/states', 'StateController@index')->name('states.index');
    Route::get('/admin/states/add', 'StateController@create')->name('states.create');
    Route::post('/admin/states/store', 'StateController@store')->name('states.store');
    Route::get('/admin/states/{state}', 'StateController@show')->name('view.state');

    Route::get('/admin/city/{city}', 'CityController@index')->name('view.city');
    Route::get('/admin/states/{state}/add-city', 'CityController@create')->name('cities.create');
    Route::post('/admin/states/{state}/store-city', 'CityController@store')->name('cities.store');
    Route::get('/admin/city/{city}/add-discount', 'DiscountController@createCityDiscount')->name('city.discount');

    Route::get('/admin/businesses', 'BusinessController@index')->name('businesses.index');
    Route::get('/admin/businesses/add', 'BusinessController@create')->name('businesses.create');
    Route::post('/admin/businesses/store', 'BusinessController@store')->name('businesses.store');
    Route::get('/admin/businesses/{business}', 'BusinessController@show')->name('view.business');

    Route::get('/admin/discounts', 'DiscountController@index')->name('discounts.index');
    Route::get('/admin/discounts/add', 'DiscountController@create')->name('discounts.create');

    Route::get('/admin/business/{business}/add-discount', 'DiscountController@createBusinessDiscount')
        ->name('business.discount');

    Route::post('/admin/discounts/store', 'DiscountController@store')->name('discounts.store');
    Route::get('/admin/discounts/{discount}', 'DiscountController@show')->name('view.discount');

});

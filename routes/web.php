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

Route::get('/', 'PagesController@index')->name('public.index');

Auth::routes();

Route::middleware('manager')->group(function () {
    Route::get('/manager', function () {
        return view('manager');
    })->name('manager.home');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::get('/test', 'TestController')->name('test');

    Route::get('/states', 'StateController@index')->name('states.index');
    Route::get('/states/add', 'StateController@create')->name('states.create');
    Route::post('/states/store', 'StateController@store')->name('states.store');
    Route::get('/states/{state}', 'StateController@show')->name('view.state');

    Route::get('/city/{city}', 'CityController@show')->name('view.city');
    Route::get('/city/{city}/activate', 'CityController@activate')->name('activate.city');
    Route::get('/city/{city}/deactivate', 'CityController@deactivate')->name('deactivate.city');
    Route::get('/states/{state}/add-city', 'CityController@create')->name('cities.create');
    Route::post('/states/{state}/store-city', 'CityController@store')->name('cities.store');
    Route::get('/cities/{city}/edit-city', 'CityController@edit')->name('cities.edit');
    Route::post('/cities/{city}/update-city', 'CityController@update')->name('cities.update');
    Route::get('/city/{city}/add-discount', 'DiscountController@createCityDiscount')->name('city.discount');

    Route::get('/businesses', 'BusinessController@index')->name('businesses.index');
    Route::get('/businesses/add', 'BusinessController@create')->name('businesses.create');
    Route::post('/businesses/store', 'BusinessController@store')->name('businesses.store');
    Route::get('/businesses/{business}', 'BusinessController@show')->name('view.business');

    Route::get('/discounts', 'DiscountController@index')->name('discounts.index');
    Route::get('/discounts/add', 'DiscountController@create')->name('discounts.create');

    Route::get('/business/{business}/add-discount', 'DiscountController@createBusinessDiscount')
        ->name('business.discount');

    Route::post('/discounts/store', 'DiscountController@store')->name('discounts.store');
    Route::get('/discounts/{discount}', 'DiscountController@show')->name('view.discount');

    Route::get('/faqs', 'FaqController@index')->name('faqs.index');
    Route::get('/faqs/add', 'FaqController@create')->name('faqs.create');
    Route::post('/faqs/store', 'FaqController@store')->name('faqs.store');
});


Route::get('/{state}/{city}', 'PagesController@city')->name('public.city');
Route::get('/{state}/{city}/signup', 'PagesController@signup')->name('public.signup');
Route::post('/{state}/{city}/register', 'SignupController@signupUser')->name('signup.user');
Route::get('/{state}/{city}/{business}/{discount}', 'PagesController@discount')->name('public.discount');

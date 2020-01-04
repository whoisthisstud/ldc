<?php

use App\City;

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
Route::get('/privacy-policy', function() {
    return view('public.privacy');
})->name('public.privacy');

Auth::routes(['verify' => true]);
// Auth::routes();

// Route::get('profile', function () {
//     // Only verified users may enter...
// })->middleware('verified');

Route::prefix('business-manager')->middleware('can:manage-businesses')->group(function () {
    Route::get('/home', function () {
        return view('manager');
    })->name('manager.home');
    Route::get('/businesses', 'BusinessController@index')->name('businesses.index');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/dashboard', 'HomeController@index')->name('home');
    Route::post('/store-media', 'StoreMediaController')->name('store.media');
    Route::get('/test', 'TestController')->name('test');
    // Route::get('/test2', function() {
    //     $city = City::find(1);
    //     return view('test2', compact('city'));
    // })->name('test2');

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
    Route::get('/businesses/{business}/get-logo', 'BusinessController@getLogo')->name('business.logo');

    Route::get('/discounts', 'DiscountController@index')->name('discounts.index');
    Route::get('/discounts/add', 'DiscountController@create')->name('discounts.create');
    Route::post('/discounts/store', 'DiscountController@store')->name('discounts.store');
    Route::get('/discounts/{discount}', 'DiscountController@show')->name('view.discount');

    Route::get('/business/{business}/add-discount', 'DiscountController@createBusinessDiscount')
        ->name('business.discount');

    Route::get('/faqs', 'FaqController@index')->name('faqs.index');
    Route::get('/faqs/add', 'FaqController@create')->name('faqs.create');
    Route::post('/faqs/store', 'FaqController@store')->name('faqs.store');

    Route::get('/users', 'Admin\UserController@index')->name('users.index');
});


Route::get('/club/{state}/{city}', 'PagesController@city')->name('public.city');
Route::get('/club/{state}/{city}/request-card', 'PagesController@signup')->name('public.signup');
Route::post('/club/{state}/{city}/register', 'ClubSignupController@signupUser')->name('signup.user');
Route::get('/club/{state}/{city}/thank-you', 'ClubSignupController@thanks')->name('signup.complete');
Route::get('/club/{state}/{city}/{business}/{discount}', 'PagesController@discount')->name('public.discount');

<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', 'PagesController@index')->name('public.index');
Route::get('/about-us', 'PagesController@about')->name('public.about');
Route::get('/contact-us', 'PagesController@contact')->name('public.contact');
Route::get('/faqs', 'PagesController@faqs')->name('public.faqs');
Route::get('/privacy-policy', 'PagesController@privacy')->name('public.privacy');
Route::get('/terms-of-use', 'PagesController@terms')->name('public.terms');

Route::post('/city-petition', 'CityRequestController@store')->name('petition.city')->middleware('throttle:3|20,1440'); //
Route::post('/business-petition', 'BusinessRequestController@store')->name('petition.business')->middleware('throttle:3|20,1440'); //

Auth::routes(['verify' => true]);

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
    Route::get('/card', 'ClubCardController@view')->name('card');

    Route::get('/states', 'StateController@index')->name('states.index');
    Route::get('/states/add', 'StateController@create')->name('states.create');
    Route::post('/states/store', 'StateController@store')->name('states.store');
    Route::get('/states/{state}', 'StateController@show')->name('view.state');

    Route::get('/city/{city}', 'CityController@show')->name('view.city');
    Route::get('/by-zip/{zip}', 'CityController@showByZip')->name('view.zip-code');
    Route::post('/city/{city}/delete', 'CityController@destroy')->name('delete.city');
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


Route::get('/clubs/{state}/{city}', 'PagesController@city')->name('public.city');
Route::post('/clubs/{state}/{city}/city-notify-request', 'MailchimpNotifyCityController')->name('mc.notify.city')->middleware('throttle:2|10,1440'); //;
Route::get('/clubs/{state}/{city}/request-card', 'PagesController@signup')->name('public.signup');
Route::post('/clubs/{state}/{city}/register', 'ClubSignupController@signupUser')->name('signup.user')->middleware('throttle:2|5,1440'); //
Route::get('/clubs/{state}/{city}/thank-you', 'ClubSignupController@thanks')->name('signup.complete');
Route::get('/clubs/{state}/{city}/{business}/{discount}', 'PagesController@discount')->name('public.discount');
Route::get('/clubs/all-cities', 'PagesController@allCities')->name('public.cities.list');
// Route::get('/states/{state}', 'PagesController@state')->name('public.state');

<?php

use App\City;
Use Newsletter;

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

// Route::get('/newsletters', function () {
//     //Get the members for a given list, optionally filtered by passing a second array of parameters
//     $news = Newsletter::getMembers('subscribers',[ 'offset' => 0, 'count' => 50, 'tags' => ['Springdale'] ]);
//     dd($news);
// });

// Route::get('/zip-codes/{zip}', function ($zip) {
//     $api_url = 'https://www.zipcodeapi.com/rest/' . config('dev.zip_code_api') . '/radius.json/' . $zip . '/10/mile';
//     $related_zips = file_get_contents($api_url);
//     // dd($related_zips);

//     $city = City::where('zip_code',$zip)->first();
//     $city->surrounding_cities = $related_zips;
//     $city->save();

//     notify()->success('Related Cities have been added for ' . $city->name . ', ' . $city->state->abbreviation, 'Related Cities Added');
//     return redirect()->route('view.city', [ $city->id ]);

//     // dd($city->surrounding_cities);

//     // $test = file_get_contents('https://secure.geonames.org/findNearbyPostalCodesJSON?postalcode=' . $zip . '&country=US&radius=20&username=yourldc');

//     // $test2 = json_encode($test->postalCodes);

//     // dd( json_encode($test) );
//     //return json_encode($test->postalCodes);
//     // $city = City::where('zip_code',$zip)->first();
//     // dd($city->surrounding_cities);
// });

// Route::get('/zip-codes/{zip}', 'RelatedCityController');

Route::get('/privacy-policy', function() {
    return view('public.privacy');
})->name('public.privacy');

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


Route::get('/club/{state}/{city}', 'PagesController@city')->name('public.city');
Route::post('/club/{state}/{city}/city-notify-request', 'MailchimpNotifyCityController')->name('mc.notify.city');
Route::get('/club/{state}/{city}/request-card', 'PagesController@signup')->name('public.signup');
Route::post('/club/{state}/{city}/register', 'ClubSignupController@signupUser')->name('signup.user');
Route::get('/club/{state}/{city}/thank-you', 'ClubSignupController@thanks')->name('signup.complete');
Route::get('/club/{state}/{city}/{business}/{discount}', 'PagesController@discount')->name('public.discount');
Route::get('/clubs/all-cities', 'PagesController@allCities')->name('public.cities.list');
Route::get('/states/{state}', 'PagesController@state')->name('public.state');







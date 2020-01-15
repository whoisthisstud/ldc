<?php

namespace App\Http\Controllers;

use App\Faq;
use App\City;
use App\State;
use App\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\Storage;
use View;

class PagesController extends Controller
{
    public function __construct(Request $request)
    {
        $this->middleware('auth');

        $select_cities = City::all();
        $select_states = State::all();
        
        View::share('select_cities', $select_cities);
        View::share('select_states', $select_states);
    }

    public function index(Request $request)
    {

        $cities = City::with('state')
            // ->where('is_active', true)
            ->orderBy('views', 'desc')
            ->take(9)
            ->get();

        $all_cities = City::with('state')->get();

        $keywords = array();
        $keywords = [
            'save money', 
            'local discounts',
            'discount club', 
            'restaurant discounts',
            'restaurant coupons',
            'business discounts', 
            'business coupons'
        ];

        if ($all_cities->count() > 0) {
            foreach ($all_cities as $city) {
                array_push($keywords, $city->name . ' ' . $city->state->abbreviation);
                array_push($keywords, $city->zip_code);
            }
        }

        SEOTools::setTitle('Home');
        SEOTools::setDescription('Coupons and Discounts for establishments in your area.');
        SEOMeta::setKeywords($keywords);
        SEOTools::opengraph()->setUrl(route('public.index'));
        SEOTools::setCanonical(route('public.index'));
        SEOTools::opengraph()->addProperty('type', 'website');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage(Storage::url('/images/city/israel-sundseth-BYu8ITUWMfc-unsplash.jpg'));

        return view('public', compact('cities'));
    }

    public function allCities()
    {
        $states = State::with('cities')->get();

        SEOTools::setTitle('All Cities');
        // SEOTools::setDescription('This is the description of the page');
        SEOTools::opengraph()->setUrl(route('public.cities.list'));
        SEOTools::setCanonical(route('public.cities.list'));
        SEOTools::opengraph()->addProperty('type', 'website');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage(Storage::url('/images/city/israel-sundseth-BYu8ITUWMfc-unsplash.jpg'));

        return view('public.all-cities', compact('states'));
    }

    public function city($state, $city)
    {
        $state = State::where('name', $state)->first();
        $city = City::where('state_id', $state->id)->where('name', $city)->first();
        $city->increment('views');
        $discounts = Discount::where('city_id', $city->id)->get();
        $faqs = Faq::where('is_active', true)->where('type', 'city')->orderBy('id', 'DESC')->get();

        $keywords = array();
        $keywords = [
            $city->name . ' ' . $state->abbreviation . ' discounts', 
            'save money', 
            'local discounts',
            'discount club', 
            'restaurant discounts',
            'restaurant coupons',
            'business discounts', 
            'business coupons',
            $city->zip_code, 
            $state->name
        ];

        if ( $city->surrounding_cities !== null ) {
            
            $surrounding = json_decode($city->surrounding_cities);

            foreach( $surrounding->zip_codes as $key => $value ) {
                array_push($keywords, $value->city . ' ' . $value->state);
                array_push($keywords, $value->zip_code);
            }
        }

        if ( $city->is_active === true && $discounts->count() > 0) {
            foreach ($discounts as $discount) {
                array_push($keywords, $discount->business->name);
            }
        }

        // SEO Details
        SEOTools::setTitle('All Cities');
        SEOMeta::setKeywords($keywords);
        SEOTools::setDescription('Request your Local Discount Club card now, for ' . $city->name . ', ' . $city->state->name . ', and start saving tonight at local establishments!');
        SEOTools::opengraph()->addProperty('type', 'website');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage($city->getMedia('city-images')->first());
        SEOTools::opengraph()->setUrl(route('public.cities.list'));
        SEOTools::setCanonical(route('public.cities.list'));

        return view('public.city', compact('city', 'discounts', 'faqs'));
    }

    public function state(State $state)
    {
        return view('public.state');
    }

    public function discount($state, $city, $business, $discount)
    {
        $state = State::where('name', $state)->first();
        $city = City::where('state_id', $state->id)->where('name', $city)->first();
        $discount = Discount::where('business_id', $business)->where('city_id', $city->id)->where('code', $discount)->first();

        return view('public.discount', compact('state', 'city', 'discount'));
    }

    public function signup($state, $city)
    {
        $state = State::where('name', $state)->first();
        $city = City::where('state_id', $state->id)->where('name', $city)->first();

        // SEO Details
        SEOTools::setTitle($city->name . ', ' . $state->abbreviation . ' club card request form');
        SEOMeta::setKeywords(['local discounts', 'discounts near me', $city->name, $city->zip_code, $city->state->name]);
        SEOTools::setDescription('Request your Local Discount Club card now, for ' . $city->name . ', ' . $city->state->name . ', and start saving tonight at local establishments!');
        SEOTools::opengraph()->addProperty('type', 'website');
        // SEOTools::twitter()->setSite('@LuizVinicius73');
        SEOTools::jsonLd()->addImage($city->getMedia('city-images')->first());
        SEOTools::opengraph()->setUrl(route('public.signup', ['state' => $state->name, 'city' => $city->name]));
        SEOTools::setCanonical(route('public.signup', ['state' => $state->name, 'city' => $city->name]));

        return view('public.signup', compact('city'));
    }
}

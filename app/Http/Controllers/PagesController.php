<?php

namespace App\Http\Controllers;

use App\Faq;
use App\City;
use App\State;
use App\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PagesController extends Controller
{

    public function __construct(Request $request) 
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $cities = City::with('state')
            // ->where('is_active', true)
            ->orderBy('views', 'desc')
            ->take(9)
            ->get();

        return view('public', compact('cities'));
    }

    public function allCities() {
        $states = State::with('cities')->get();
        return view('public.all-cities', compact('states'));
    }

    public function city($state, $city)
    {
        $state = State::where('name', $state)->first();
        $city = City::where('state_id', $state->id)->where('name', $city)->first();
        $city->increment('views');
        $discounts = Discount::where('city_id', $city->id)->get();
        $faqs = Faq::where('is_active', true)->orderBy('id','DESC')->get();

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

        return view('public.signup', compact('city'));
    }
}

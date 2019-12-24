<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Discount;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $cities = City::withCount('discounts')
            ->orderBy('discounts_count', 'desc')
            ->take(9)
            ->get();

        return view('public', compact('cities'));
    }

    public function city($state, $city)
    {
        $state = State::where('name', $state)->first();
        $city = City::where('state_id', $state->id)->where('name', $city)->first();
        $discounts = Discount::where('city_id', $city->id)->get();

        return view('public.city', compact('city', 'discounts'));
    }

    public function discount($state, $city, $business, $discount)
    {
        $state = State::where('name', $state)->first();
        $city = City::where('state_id', $state->id)->where('name', $city)->first();
        $discount = Discount::where('business_id', $business)->where('city_id', $city->id)->where('code', $discount)->first();

        return view('public.discount', compact('state', 'city', 'discount'));
    }
}

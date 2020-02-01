<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use View;
use App\City;
use App\State;
use App\Business;
use App\Discount;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function card()
    {
        $city = City::where('id', 1)        // Get the city
            ->where('is_active', true)       // and ensure active
            ->with('state')                 // Lazy-load respective state
            ->first();

        if (empty($city)) {
            notify()->error('City either inactive or not found', 'ERROR');
            return redirect()->back();
        }

        $discounts = Discount::where('city_id', $city->id)
            ->where('begins_at', '<=', now())
            ->where('expires_at', '>', now())
            ->limit(15)
            ->get();

        if (empty($discounts)) {
            notify()->error('No discounts found.', 'ERROR');
            return redirect()->back();
        }

        $season = DB::table('city_season')  // Get the season
            ->where('city_id', $city->id)    // for this city,
            ->where('begins_on', '<=', now()) // that begins before, or on, today
            ->where('ends_on', '>=', now())   // and ends after, or on, today
            ->where('filled', '1')           // where all discount "spots" are sold.
            ->first();                      // Take the first result. (should be 1)

        if (empty($season)) {
            notify()->error('No seasons found. Are you sure you\'ve activated the city?', 'ERROR');
            return redirect()->back();
        }

    	return view('test', compact('city', 'season', 'discounts'));
    }

    public function thanks()
    {
        $select_cities = City::all();
        $select_states = State::with('cities')->get();

        View::share('select_cities', $select_cities);
        View::share('select_states', $select_states);

        $user = Auth::user();
        $city = City::find(1);
        return view('public.thank-you', compact('user','city'));
    }
}

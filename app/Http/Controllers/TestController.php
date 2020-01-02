<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Business;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function __invoke()
    {
    	// $businesses = Business::all();
    	// $business = Business::find(4);
    	// $states = State::with('cities')->orderBy('name', 'ASC')->get();
    	// $state = State::find(1);

    	// foreach( $states as $state ) {
    	// 	$signups = 0;
    	// 	$discounts = 0;
    	// 	foreach( $state->cities as $city ){
	    // 		$signups += $city->users()->count();
	    // 		$discounts += $city->discounts()->count();
	    // 	}
	    // 	$state->signups = $signups;
	    // 	$state->discounts = $discounts;
    	// }

    	$city = City::find(1);

    	return view('test', compact('city'));
    }
}

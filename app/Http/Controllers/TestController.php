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
    	$businesses = Business::all();
    	$business = Business::find(4);
    	$states = State::all();
    	$state = State::find(1);
    	// $cities = City::with('discounts')->where('state_id','1')->get();

    	return view('test', compact('businesses', 'business', 'states', 'state'));
    }
}

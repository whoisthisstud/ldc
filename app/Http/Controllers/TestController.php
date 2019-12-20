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
    	$businesses = Business::all(); // Fayetteville
    	// $cities = City::with('discounts')->where('state_id','1')->get();

    	return view('test', compact('businesses'));
    }
}

<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;

class PublicBaseController extends Controller
{
    public function __construct()
	{
		$select_cities = City::all();
		$select_states = State::all();
		
		View::share('select_cities', $select_cities);
		View::share('select_states', $select_states);
	}
}

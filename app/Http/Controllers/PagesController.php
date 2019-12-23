<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
    	// $cities = City::all();
    	
   //  	City::select('cities.*, COUNT(discounts.id) as discounts_count')
			// ->leftjoin('discounts', 'discounts.city_id', '=', 'city.id')
			// ->groupBy('discounts.id')
			// ->orderBy('discounts_count', 'desc')
			// ->paginate(12);

    	$cities = City::withCount('discounts')
    		->orderBy('discounts_count', 'desc')
    		->take(9)
    		->get();

    	return view('public', compact('cities'));
    }
}

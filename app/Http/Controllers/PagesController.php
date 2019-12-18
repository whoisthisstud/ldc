<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index() {
    	$cities = City::all();
    	return view('public', compact('cities'));
    }
}

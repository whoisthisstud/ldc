<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;

class SignupController extends Controller
{
    public function signupUser(State $state, City $city, Request $request)
    {
        // $state = State::where('name', $state)->first();
        // $city = City::where('state_id', $state->id)->where('name', $city)->first();
        dd($request);
    }
}

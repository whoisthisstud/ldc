<?php

namespace App\Http\Controllers;

use App\Role;
use App\User;
use App\City;
use App\State;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SignupUserRequest;

class ClubSignupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest');
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function signupUser(State $state, City $city, SignupUserRequest $request)
    {

        $validated = $request->validated();

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => Hash::make($request['password']),
        ]);

        $user->cities()->attach($city);

        $role = Role::where('name','discount-user')->first();
        $user->roles()->attach($role);
        $user->save();

        $user->sendEmailVerificationNotification();

        notify()->success('You have registered for the ' . $city->name . ', ' . $state->abbreviation . ' club. Please check your email.', 'Signup Complete', ['timeOut' => 10000]);

        return view('public.thank-you', compact('city', 'user'));
        // return redirect()->route('signup.complete', [$state, $city])->with('user', $user);
    }

    public function thanks(State $state, City $city)
    {
        $select_cities = City::all();
        $select_states = State::with('cities')->get();

        View::share('select_cities', $select_cities);
        View::share('select_states', $select_states);

        return view('public.thank-you', compact('city'));
    }
}

<?php

namespace App\Http\Controllers;

use Auth;
use Gate;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function profile(User $user)
    {
    	$user = User::where('id',Auth::id())
    		->with('cities')
    		->first();

        return view('public.user-profile', compact('user'));
    }
}

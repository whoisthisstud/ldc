<?php

namespace App\Http\Controllers;

// use Auth;
use Gate;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
 
		if( ! ( Auth::id() === $user->id || Auth::user()->hasAnyRoles(['superadmin','admin']) ) ) {
			notify()->error('You are not authorized to view this user', 'Access Denied', ['timeOut' => 0]);
        	return redirect()->back();
		}

    	$user = User::where('id',$user->id)
    		->with('cities')
    		->first();

        return view('public.user-profile', compact('user'));
    }
}

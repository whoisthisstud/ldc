<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class MailchimpNotifyCityController extends Controller
{
    public function __invoke(State $state, City $city, Request $request) 
    {
    	if ( ! Newsletter::isSubscribed($request->email) ) 
    	{
		        Newsletter::subscribe($request->email);
		}
    	// Newsletter::subscribe($request->email);
    	
    	Newsletter::addTags([$state->name, $city->name], $request->email);

    	notify()->success('You have registered to recieve notifications when ' . $city->name . ', ' . $state->abbreviation . ' becomes available.', 'Notification Request Received', ['timeOut' => 5000]);

        return redirect()->back();
    }
}

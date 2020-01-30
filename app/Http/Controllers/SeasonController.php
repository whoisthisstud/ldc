<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class SeasonController extends Controller
{
	public function __construct()
	{
		$this->middleware('can:manage-discounts');
	}

    public function ajaxGetSeasons(City $city)
    {
    	if( $city->is_active != true || $city->seasons->count() < 1 ) {
            return response()->json(['success'=>'No Seasons','error'=>'failed']);
        }

        $seasons = $city->seasons;

    	return response()->json(['success'=>'Request working','seasons'=>json_encode($seasons)]);
    }
}

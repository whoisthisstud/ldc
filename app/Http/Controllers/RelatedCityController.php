<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class RelatedCityController extends Controller
{
	public $city;
	public $zip;
	private $api;

    public function __invoke ( City $city ) 
    {
    	$this->zip = $city->zip;
    	$this->api = config('dev.zip_code_api');

    	// $city = City::where('zip_code',$zip)->first();

    	// dd($city);

    	if( !$city || $this->zip === null || $this->api === null ) 
    	{
    		notify()->error('We\'re having API issues... The related cities were not added to this city.', 'ERROR');
    		return false;
    	}

    	if( $city->surrounding_cities != null ) 
    	{
    		notify()->warning('The city already has surrounding cities added.', 'WARNING');
			return true;
		}

		$related_zips = file_get_contents('https://www.zipcodeapi.com/rest/' . $this->api . '/radius.json/' . $this->zip . '/10/mile');

		$city->surrounding_cities = $related_zips;
		$city->save();

		notify()->success('The related cities for ' . $city->name . ', ' . $city->state->abbreviation . ' were successfully added to this city.', 'Cha Ching!');
		
    	return true;
    }
}

<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;

class RelatedCityController extends Controller
{
	public $city;
	public $zip;
	private $api;

    public function __invoke ( $zip ) 
    {
    	$this->zip = $zip;
    	$this->api = config('dev.zip_code_api');

    	$city = City::where('zip_code',$zip)->first();

    	// dd($city);

    	if( !$city || $this->zip === null || $this->api === null ) 
    	{
    		return false;
    	}

    	if( $city->surrounding_cities != null ) 
    	{
			return true;
		}

		$related_zips = file_get_contents('https://www.zipcodeapi.com/rest/' . $this->api . '/radius.json/' . $this->zip . '/10/mile');

		$city->surrounding_cities = $related_zips;
		$city->save();

    	return true;
    }
}

<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use View;
use App\City;
use App\Discount;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClubCardController extends Controller
{
    public function view()
    {
        // $client = new Client();

        // Eventually we'll type-hint the exact city 
        // by changing the inital where('id',1) to where('id',$city->id)
        // Tell me again why we can't type-hint a where method?
        // i.e. City::where($city)->with()...

        $city = City::where('id', 1)        // Get the city
            ->where('is_active',true)       // and ensure active
            ->with('state')                 // Lazy-load respective state
            ->first();

        if( empty($city) ) {
            notify()->error('City either inactive or not found', 'ERROR');
            return redirect()->back();
        }

        $discounts = Discount::where('city_id',$city->id)
            ->where('begins_at','<=',now())
            ->where('expires_at','>',now())
            ->get();

        $season = DB::table('city_season')  // Get the season
            ->where('city_id',$city->id)    // for this city,
            ->where('begins_on','<=',now()) // that begins before, or on, today
            ->where('ends_on','>=',now())   // and ends after, or on, today
            ->where('filled','1')           // in which all discount "spots" are sold.
            ->first();                      // Take the first result. (should only be 1)

        return view('layouts.card-pdf', compact('city','season','discounts'));

    }

    protected function generatePdf()
    {
        // Create the PDF
        // Attach it to the city object as a media item (spatie media library)
    }

    public function downloadPDF()  //City $city
    {
        $city = City::where('id', 1)
            ->with('state')
            ->with('discounts')
            ->first();
        // $pdf = $city->getMedia('city-cards');
        $pdf = PDF::loadView('layouts.card-pdf', compact('city'));

        return $pdf->setPaper([0, 0, 504, 288], 'landscape')->download($city->name . '_' . $city->state->abbreviation . '-club_card.pdf');
    }

}

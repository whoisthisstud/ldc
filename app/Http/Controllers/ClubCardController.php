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

        // $city = City::where('id', 1)        // Get the city
        //     ->with('state')                 // Lazy-load respective state
        //     ->with('discounts')             // Lazy-load respective discounts
        //     ->with('seasons')
        //     ->first();

        $city = City::where('id', 1)        // Get the city
            ->with('state')                 // Lazy-load respective state
            ->with('seasons')
            ->first();

        $discounts = Discount::inSeason($city);
            // $discounts = Discount::where('city_id',$city->id)
            //     ->where('begins_at','<=',now())
            //     ->where('expires_at','>',now())
            //     ->get();

        $season = DB::table('city_season')  // Get the season
            ->where('city_id',$city->id)    // for this city,
            ->where('begins_on','<=',now()) // that begins before, or on, today
            ->where('ends_on','>=',now())   // and ends after, or on, today
            ->where('filled','1')           // in which all discount "spots" are sold.
            ->first();                      // Take the first result. (should only be 1)

        // dd($season);

        // $html = view('layouts.card-pdf', compact('city'))->render();
        // $css = view('_partials.inline.cardpdf-inline-styles')->render();
        // $google_fonts = "Barlow";

        // // Retrieve your user_id and api_key from https://htmlcsstoimage.com/dashboard
        // $res = $client->request('POST', 'https://hcti.io/v1/image', [
        //   'auth' => ['b58716a9-6352-4f12-91dc-cb196e6f8454', '8e2604a2-494d-4a45-a1d4-a732945bd347'],
        //   'form_params' => ['html' => $html, 'css' => $css, 'google_fonts'=>$google_fonts]
        // ]);

        // echo $res->getBody();

        return view('layouts.card-pdf', compact('city','season','discounts'));
        // $pdf = PDF::loadView('layouts.card-pdf', compact('city'));
        // $pdf = PDF::loadView('layouts.card-pdf', compact('city'))->setPaper([0, 0, 504, 288], 'landscape');
        // return $pdf->stream();
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

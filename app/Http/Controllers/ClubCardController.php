<?php

namespace App\Http\Controllers;

use PDF;
use View;
use App\City;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ClubCardController extends Controller
{
    public function view()
    {
        $client = new Client();

        $city = City::where('id', 1)
            ->with('state')
            ->with('discounts')
            ->first();

        $html = view('layouts.card-pdf', compact('city'))->render();
        $css = view('_partials.inline.cardpdf-inline-styles')->render();
        $google_fonts = "Barlow";

        // Retrieve your user_id and api_key from https://htmlcsstoimage.com/dashboard
        $res = $client->request('POST', 'https://hcti.io/v1/image', [
          'auth' => ['b58716a9-6352-4f12-91dc-cb196e6f8454', '8e2604a2-494d-4a45-a1d4-a732945bd347'],
          'form_params' => ['html' => $html, 'css' => $css, 'google_fonts'=>$google_fonts]
        ]);

        echo $res->getBody();

        // return view('layouts.card-pdf', compact('city'));
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

<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\City;
use App\Business;
use App\Discount;
use App\DiscountView;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class DiscountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('index');
        $this->middleware('can:manage-discounts')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beg = Carbon::parse('today -30 days');
        $end = now();

        $ranges = CarbonPeriod::create($beg, $end);

        $views = DiscountView::select(
                DB::raw('DATE(created_at) as date'), 
                DB::raw('count(*) as views')
            )->groupBy('date')
            ->get();
        
        $dates = [];
        // foreach( $ranges as $date ) {
        //     foreach( $views as $view ) {
        //         if( strtotime($view->date) == $date->timestamp ) {
        //             array_push($dates, [ 'date' => $date->timestamp, 'views' => $view->views ]);
        //         } else {
        //             array_push($dates, [ 'date' => $date->timestamp, 'views' => 0 ]);
        //         }
        //     }
        // }
        foreach( $ranges as $date ) {
            // if( array_search() )
            array_push($dates, ['date' => $date->format('m/d/y'),'views' => 0] );
        }

        $views = $views->toArray();

        // array_map(function ($a, $b) { 
        //     return $a + $b; 
        // }, $dates, $views);
        foreach (array($dates, $views) as $array) { 
            foreach ($array as $data) {
                $key = strtotime($data['date']); // convert to a timestamp so it will be sortable
                $date_list[$key]['date'] = $data['date'];
                $date_list[$key]["views"] = $data["views"];
            }
        }

        // dd($dates);

        return view('admin.discounts.index', compact('beg','end','dates','date_list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discounts.create');
    }

    public function createBusinessDiscount(Business $business)
    {
        $cities = City::all();
        return view('admin.discounts.create', compact('business', 'cities'));
    }

    public function createCityDiscount(City $city)
    {
        $businesses = Business::all();
        return view('admin.discounts.create', compact('city', 'businesses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Max 35 characters on the title
        dd($request);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        // DiscountView::create([
        //     'discount_id' => $discount->id,
        //     'user_id' => Auth::id(),
        //     'business_id' => $discount->business_id,
        //     'city_id' => $discount->city_id
        // ]);

        return view('admin.discounts.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        return view('admin.discounts.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        // check how many discounts are within the date range of this discount.
        // If below 15, then mark the city_season table row as $filled = false;
    }
}

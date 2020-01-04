<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Season;
use App\Http\Requests\StoreCityRequest;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index()
    {
        //
    }


    public function create(State $state)
    {
        return view('admin.cities.create', compact('state'));
    }


    public function store(State $state, StoreCityRequest $request)
    {
        $validated = $request->validated();

        // validate the uploaded file
        // $validation = $request->validate([
        //     'image' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        //     // for multiple file uploads
        //     // 'image.*' => 'required|file|image|mimes:jpeg,png,gif,webp|max:2048'
        // ]);

        $city = City::create($validated + ['state_id' => $state->id]);

        // $file      = $validation['image']; // get the validated file
        // $extension = $file->getClientOriginalExtension();
        // $filename  = $city->name . '-' . $city->state->abbreviation . '_' . time() . '.' . $extension;

        $media = $city->addMedia(storage_path('tmp/uploads/' . $request['image.0']))
            //->usingFileName($filename)
            ->toMediaCollection('city-images', 'cityImages');

        notify()->success($city->name . ', ' . $city->state->abbreviation . ' has been added', 'City Added');
        return redirect()->route('view.state', [ $state->id ]);
    }


    public function show(City $city)
    {
        return view('admin.cities.index', compact('city'));
    }


    public function edit(City $city)
    {
        return view('admin.cities.create', compact('city'));
    }


    public function update(StoreCityRequest $request, City $city)
    {
        $validated = $request->validated();

        City::where('id', $city->id)->update($validated);

        if (! empty($request['image.0'])) {
            $media = $city->addMedia(storage_path('tmp/uploads/' . $request['image.0']))
                ->toMediaCollection('city-images', 'cityImages');
        }

        notify()->success($city->name . ', ' . $city->state->abbreviation . ' has been updated', 'City Updated');
        return redirect()->route('view.city', [ $city->id ]);
    }


    public function activate(City $city)
    {
        $seasons = Season::all();
        $counter = 0;

        if( $city->is_active === true ) {
            notify()->error($city->name . ', ' . $city->state->abbreviation . ' is already active', 'Activation Error');
            return redirect()->route('view.city', [ $city->id ]);
        }

        // If City has already had seasons created
        if( $city->seasons->count() != null ) {
            if( $city->availableDiscounts->count() < 15 ) {
                notify()->error($city->name . ', ' . $city->state->abbreviation . ' does not have 15 discounts available to activate city', 'Activation Error');
                return redirect()->route('view.city', [ $city->id ]);
            }

            if( $city->availableDiscounts->count() > 15 ) {
                notify()->error($city->name . ', ' . $city->state->abbreviation . ' has too many active discounts available to activate city. <strong>Remove ' . ($city->availableDiscounts->count() - 15) . ' discounts to activate.</strong>', 'Activation Error');
                return redirect()->route('view.city', [ $city->id ]);
            }

            // $newCitySeasons = array();

            // foreach( $seasons as $season ) {
            //     if( $counter != 0 ) {
            //         $filled = false;
            //     } else {
            //         $filled = true;
            //     }
            //     // add years equal to $counter to today's date
            //     $beginsAt = date( "y-m-d h:i:s", mktime(0, 0, 0, date("m"), date("d"), date("Y")+$counter) );
            //     // add years equal to $counter to today's date, plus one
            //     $expiresAt = date( "y-m-d h:i:s", mktime(23, 59, 59, date("m"), date("d")-1, date("Y")+$counter+1) );

            //     $newCitySeasons[$season->season_num] = [
            //         'begins_on' => $beginsAt,
            //         'ends_on' => $expiresAt,
            //         'filled' => $filled
            //     ];

            //     $counter++;
            // }

            // $city->seasons()->sync($newCitySeasons);

        } else { // City Seasons are being created the first time
            if( $city->newDiscounts->count() != 15 ) {
                notify()->error($city->name . ', ' . $city->state->abbreviation . ' does not have 15 available discounts to activate city', 'Not Enough Discounts');
                return redirect()->route('view.city', [ $city->id ]);
            }
            //Loop through each of the seasons and create related city_season records
            foreach( $seasons as $season ) {
                // if it's **not** the first season
                if( $counter != 0 ) {
                    // add years equal to $counter to today's date
                    $beginsAt = date( "y-m-d h:i:s", mktime(0, 0, 0, date("m"), date("d"), date("Y")+$counter) );
                    // add years equal to $counter to today's date, plus one
                    $expiresAt = date( "y-m-d h:i:s", mktime(23, 59, 59, date("m"), date("d")-1, date("Y")+$counter+1) );
                    $filled = false;
                } else {
                    // if it's the first season
                    // set $beginsAt to now and $expiresAt a year from now
                    $beginsAt = now();// Replace with $request->activation_date;

                    $expiresAt = date( "y-m-d h:i:s", mktime(23, 59, 59, date("m"), date("d")-1, date("Y")+1) );
                    $filled = true;

                    // Since this is the first season, we need to
                    // set the expiration date of all current active discounts for this city
                    foreach( $city->newDiscounts as $discount ) {
                        $discount->begins_at = $beginsAt;
                        $discount->expires_at = $expiresAt;
                        $discount->save();
                    }
                }           
            
                $city->seasons()->attach([
                    $season->season_num => [
                        'begins_on' => $beginsAt,
                        'ends_on' => $expiresAt,
                        'filled' => $filled
                    ]  
                ]);
                
                $counter++;
            }
        }

        $city->is_active = true;
        $city->save();

        notify()->success($city->name . ', ' . $city->state->abbreviation . ' has been activated', 'City Activated');
        return redirect()->route('view.city', [ $city->id ]);
    }

    public function deactivate(City $city)
    {
        $city->is_active = false;
        $city->save();

        notify()->success($city->name . ', ' . $city->state->abbreviation . ' has been deactivated', 'City Dectivated');
        return redirect()->route('view.city', [ $city->id ]);
    }


    public function destroy(City $city)
    {
        //
    }
}

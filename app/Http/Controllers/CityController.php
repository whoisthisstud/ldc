<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
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

        $city = City::create($validated + ['state_id' => $state->id]);

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

        notify()->success($city->name . ', ' . $city->state->abbreviation . ' has been updated', 'City Updated');
        return redirect()->route('view.city', [ $city->id ]);
    }

    public function activate(City $city)
    {
        $city->is_active = true;
        $city->save();

        notify()->success($city->name . ', ' . $city->state->abbreviation . ' has been activated', 'City Activated');
        return redirect()->route('view.city', [ $city->id ]);
    }

    public function deactivate(City $city)
    {
        $city->is_active = false;
        $city->save();

        notify()->warning($city->name . ', ' . $city->state->abbreviation . ' has been deactivated', 'City Dectivated');
        return redirect()->route('view.city', [ $city->id ]);
    }


    public function destroy(City $city)
    {
        //
    }
}

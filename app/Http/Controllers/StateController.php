<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use App\Http\Requests\StoreStateRequest;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::with('cities')->orderBy('name', 'ASC')->get();

        foreach( $states as $state ) {
            $signups = 0;
            $discounts = 0;

            foreach( $state->cities as $city ){
                $signups += $city->users()->count();
                $discounts += $city->discounts()->count();
            }
            
            $state->signups = $signups;
            $state->discounts = $discounts;
        }

        return view('admin.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.states.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStateRequest $request)
    {
        $validated = $request->validated();

        $state = State::create($validated);

        notify()->success($state->name . ' has been added', 'State Added');
        return redirect()->route('states.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        return view('admin.states.show', compact('state'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }
}

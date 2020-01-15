<?php

namespace App\Http\Controllers;

use App\CityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'state_id' => 'required',
                'city_name' => 'required|string|max:255',
            ],
            [
                'state_id.required' => 'The state is required.',
                'city_name.required' => 'A city name is required',
                'city_name.string' => 'The city name must be a string',
                'city_name.max' => 'The city name can not be longer than 255 characters.'
            ]
        );

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json(array(
                    'success' => false,
                    'message' => 'There is data missing from the form!',
                    'errors' => $validator->getMessageBag()->toArray()
                ), 422);
            }

            $this->throwValidationException(
                $request,
                $validator
            );
        }

        $cityRequest = new CityRequest();
        $cityRequest->state_id = $request->state_id;
        $cityRequest->city_name = $request->city_name;
        $cityRequest->ip_address = $request->ip();
        $cityRequest->save();

        return response()->json(['success'=>'Thank you! Your request to add a new city has been received.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CityRequest  $cityRequest
     * @return \Illuminate\Http\Response
     */
    public function show(CityRequest $cityRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CityRequest  $cityRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(CityRequest $cityRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CityRequest  $cityRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CityRequest $cityRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CityRequest  $cityRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(CityRequest $cityRequest)
    {
        //
    }
}

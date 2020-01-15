<?php

namespace App\Http\Controllers;

use App\BusinessRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\RequestBusinessRequest;

class BusinessRequestController extends Controller
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
    public function store(Request $request) //RequestBusinessRequest
    {
        $validator = Validator::make(
            $request->all(),
            [
                'city_id' => 'required',
                'business' => 'required|string|max:255',
            ],
            [
                'city_id.required' => 'The city is required.',
                'business.required' => 'A business name is required',
                'business.string' => 'The business name must be a string',
                'business.max' => 'The business name can not be longer than 255 characters.'
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

        $bizRequest = new BusinessRequest();
        $bizRequest->city_id = $request->city_id;
        $bizRequest->business_name = $request->business;
        $bizRequest->ip_address = $request->ip();
        $bizRequest->save();

        return response()->json(['success'=>'Thank you! Your request for a new business for this city has been received.']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BusinessRequest  $businessRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(BusinessRequest $businessRequest)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\BusinessRequest;
use Illuminate\Http\Request;
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RequestBusinessRequest $request)
    {
        $validated = $request->validate();
        dd($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BusinessRequest  $businessRequest
     * @return \Illuminate\Http\Response
     */
    public function show(BusinessRequest $businessRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BusinessRequest  $businessRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(BusinessRequest $businessRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BusinessRequest  $businessRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BusinessRequest $businessRequest)
    {
        //
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

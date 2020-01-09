@extends('layouts.app')

@section('styles')
<link rel="stylesheet" href="{{ asset('vendors/dropzone/basic.css') }}">
<link rel="stylesheet" href="{{ asset('vendors/dropzone/dropzone.css') }}">
@endsection

@section('content')
<div class="container">

    <form action="{{ Route::is('cities.create') ? route('cities.store', [ 'state' => $state->id ]) : route('cities.update', [ 'city' => $city->id ]) }}" class="needs-validation" novalidate="" method="POST" class="">
        @csrf

        <div class="row">
            <div class="col-12">

                <section class="sub-header">
                    <div class="container">

                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="pt-1">
                                    <span class="d-inline-block">
                                        <a href="{{ Route::is('cities.create') ? route('view.state', [ 'state' => $state->id ]) : route('view.state', [ 'state' => $city->state->id ]) }}" class="text-decoration-none">
                                            <!-- <i class="fas fa-home"></i> -->
                                            {{ Route::is('cities.create') ? $state->abbreviation : $city->state->abbreviation }}
                                        </a>
                                        &nbsp; &raquo; &nbsp;
                                    </span>
                                    <h5 class="d-inline-block">{{ Route::is('cities.create') ? 'Add' : 'Edit' }} City</h5>
                                </div>
                            </div>

                            <div class="col-12 col-md-6 d-none d-md-inline-block">
                                <ul class="submenu ml-auto mb-0 text-right">
                                    <li class="nav-item d-inline-block">
                                        <a type="cancel" href="{{ url()->previous() }}" class="btn btn-sm btn-default">Cancel</a>
                                    </li>

                                    <li class="nav-item d-inline-block">
                                        <button type="submit" class="btn btn-sm btn-primary btn-badge">
                                            <i class="fas fa-save mr-1"></i>
                                            Save City
                                        </button>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </section>
                <!-- <hr class="h-separator"> -->
            </div>
        </div>

        <div class="row justify-content-between mt-5 mb-4">
            
            @if( Route::is('cities.create') )
                <div class="col-md-5 col-sm-12 pr-5 ml-3">
                    <h5 class="">A New City</h5>
                    <p><small>Adding a new city represents adding a new market to this site.</small></p>
                    <p><small>By adding a city, you will make this market available for businesses and discounters, alike. <em>Get 'em, tiger!</em></small></p>
                </div>
            @else
                <div id="popular" class="col-md-4 col-sm-12">    
                    <div class="card popular-city-card mb-4 pb-4 shadow-sm" style="">
                        <img class="card-bg-img" src="{{ !empty($city->media->first()) ? Storage::url($city->media->first()->getUrl('thumb')) : Storage::url('/images/city/israel-sundseth-BYu8ITUWMfc-unsplash.jpg') }}">
                        <a href="{{ route('public.city', [ 'state' => $city->state->name, 'city' => $city->name ]) }}">
                            <div class="card-body" style="min-height: 200px;">
                                <div class="center-within">
                                    <h1 class="city-name text-center">{{ $city->name }}</h1>
                                    <p class="city-state-name text-center">{{ $city->state->name }}</p>
                                    <p class="city-discount-count text-center m-0">
                                        <small class="text-light">{{ $city->discounts()->count() }} Discounts</small>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            @endif

            <div class="col-md-6 col-sm-12 mr-3">
                <section class="card shadow-5">
                    <div class="card-body row">
                        <div class="col-md-9 mb-3">
                            <label for="name">City Name</label>
                            <input type="text" class="form-control" id="name" placeholder="City Name" value="{{ $city->name ?? old('name') }}" required="" name="name">
                            <div class="invalid-feedback" style="{{ $errors->has('name') ? 'display:block;' : '' }}">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" class="form-control" id="zip_code" placeholder="Zip Code" value="{{ $city->zip_code ?? old('zip_code') }}" required="" name="zip_code">
                            <div class="invalid-feedback" style="{{ $errors->has('zip_code') ? 'display:block;' : '' }}">
                                {{ $errors->first('zip_code') }}
                            </div>
                        </div>

                        <div class="col-12">                                   
                            <div class="form-group">
                                <label for="file">City Image</label>
                                <div class="needsclick dropzone" id="document-dropzone">
                                    <div class="fallback">
                                        <input name="file" type="file" />
                                    </div>
                                </div>
                                <div class="invalid-feedback" style="{{ $errors->has('file') ? 'display:block;' : '' }}">
                                    {{ $errors->first('file') }}
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="card-footer d-sm-block d-md-none">
                        <ul class="submenu ml-auto mb-0 text-right">
                            <li class="nav-item d-inline-block">
                                <a type="cancel" href="{{ url()->previous() }}" class="btn btn-sm btn-default">Cancel</a>
                            </li>

                            <li class="nav-item d-inline-block">
                                <button type="submit" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-save mr-1"></i>
                                    Save State
                                </button>
                            </li>
                        </ul>
                    </div>

                </section>

            </div>
        </div>

    </form>

</div>
@endsection

@section('scripts')
    @include('_partials.scripts.dropzone')
@endsection
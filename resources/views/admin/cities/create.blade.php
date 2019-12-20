@extends('layouts.app')

@section('content')
<!-- <div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('cities.store', [ 'state' => Request::segment(3) ]) }}" class="needs-validation" novalidate="" method="POST">                        
                @csrf
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="pt-2">
                            <h5 class="">Add New City</h5>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="name">City</label>
                                <input type="text" class="form-control" id="name" placeholder="City Name" value="{{ old('name') }}" required="" name="name">
                                <div class="invalid-feedback" style="{{ $errors->has('name') ? 'display:block;' : '' }}">
                                    {{ $errors->first('name') }}
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="zip_code">Zip Code</label>
                                <input type="text" class="form-control" id="zip_code" placeholder="Zip Code" value="{{ old('zip_code') }}" required="" name="zip_code">
                                <div class="invalid-feedback" style="{{ $errors->has('zip_code') ? 'display:block;' : '' }}">
                                    {{ $errors->first('zip_code') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <div class="form-buttons ml-auto">
                            <a type="cancel" href="{{ url()->previous() }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add City</button>
                            </div>
                        </div>                  
                    </div>
                </div>
            </form>
        </div>
    </div>
</div> -->

<div class="container">
            
    <form action="{{ route('cities.store', [ 'state' => $state->id ]) }}" class="needs-validation" novalidate="" method="POST">                        
        @csrf

        <div class="row">
            <div class="col-12">

                <section class="sub-header">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="pt-1">
                                    <span class="d-inline-block align-text-bottom mt-n2">
                                        <a href="{{ route('view.state', [ 'state' => $state->id ]) }}" class="text-decoration-none">
                                            <!-- <i class="fas fa-home"></i> -->
                                            {{ $state->name }}
                                        </a>
                                        &nbsp; &raquo; &nbsp;
                                    </span>
                                    <h5 class="d-inline-block">Add City</h5>               
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
                                            Save State
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

            <div class="col-md-5 col-sm-12 pr-5 ml-3">
                <h5 class="">A New City</h5>
                <p><small>Adding a new city represents adding a new market to this site.</small></p>
                <p><small>By adding a city, you will make this market available for businesses and discounters, alike. <em>Get 'em, tiger!</em></small></p>
            </div>

            <div class="col-md-6 col-sm-12 mr-3">

                <section class="card shadow-5">

                    <div class="card-body row">
                        <div class="col-md-9 mb-3">
                            <label for="name">City Name</label>
                            <input type="text" class="form-control" id="name" placeholder="City Name" value="{{ old('name') }}" required="" name="name">
                            <div class="invalid-feedback" style="{{ $errors->has('name') ? 'display:block;' : '' }}">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="zip_code">Zip Code</label>
                            <input type="text" class="form-control" id="zip_code" placeholder="Zip Code" value="{{ old('zip_code') }}" required="" name="zip_code">
                            <div class="invalid-feedback" style="{{ $errors->has('zip_code') ? 'display:block;' : '' }}">
                                {{ $errors->first('zip_code') }}
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
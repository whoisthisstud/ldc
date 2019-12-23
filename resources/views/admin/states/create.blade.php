@extends('layouts.app')

@section('content')
<div class="container">
            
    <form action="{{ route('states.store') }}" class="needs-validation" novalidate="" method="POST">                        
        @csrf

        <div class="row">
            <div class="col-12">

                <section class="sub-header">
                    <div class="container">
                        
                        <div class="row">
                            <div class="col-12 col-md-6 d-flex">
                                <div class="pt-1">
                                    <span class="d-inline-block align-text-bottom mt-n2">
                                        <a href="{{ route('states.index') }}" class="text-decoration-none">
                                            <!-- <i class="fas fa-home"></i> -->
                                            States
                                        </a>
                                        &nbsp; &raquo; &nbsp;
                                    </span>
                                    <h5 class="d-inline-block">Add State</h5>               
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
                <h5 class="">A New State</h5>
                <p><small>Adding a new state is a pretty big deal!</small></p>
                <p><small>Don't worry about whether this will negatively affect your users. You can add a state and nothing will show until you add cities. <em>Go get 'em, tiger!</em></small></p>
            </div>

            <div class="col-md-6 col-sm-12 mr-3">

                <section class="card shadow-5">

                    <div class="card-body row">
                        <div class="col-md-9 mb-3">
                            <label for="name">State Name</label>
                            <input type="text" class="form-control" id="name" placeholder="State Name" value="{{ old('name') }}" required="" name="name">
                            <div class="invalid-feedback" style="{{ $errors->has('name') ? 'display:block;' : '' }}">
                                {{ $errors->first('name') }}
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="abbreviation">Zip Code</label>
                            <input type="text" class="form-control" id="abbreviation" placeholder="Abbreviation" value="{{ old('abbreviation') }}" required="" name="abbreviation">
                            <div class="invalid-feedback" style="{{ $errors->has('abbreviation') ? 'display:block;' : '' }}">
                                {{ $errors->first('abbreviation') }}
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
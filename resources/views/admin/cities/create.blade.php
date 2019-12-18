@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <form action="{{ route('cities.store', [ 'state' => Request::segment(2) ]) }}" class="needs-validation" novalidate="" method="POST">                        
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
</div>
@endsection
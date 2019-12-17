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
            <form action="{{ route('states.store') }}" class="needs-validation" novalidate="" method="POST">
                <div class="card">
                    <div class="card-header d-flex">
                        <div class="pt-2">
                            <h5 class="">Add New State</h5>
                        </div>
                    </div>

                    <div class="card-body">                        
                        @csrf
                        <div class="row">
                            <div class="col-md-9 mb-3">
                                <label for="name">State</label>
                                <input type="text" class="form-control" id="name" placeholder="State Name" value="{{ old('name') }}" required="" name="name">
                                <div class="invalid-feedback">
                                    {{ $errors->first('email') }}
                                </div>
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="abbreviation">Abbreviation</label>
                                <input type="text" class="form-control" id="abbreviation" placeholder="Abbreviation" value="{{ old('abbreviation') }}" required="" name="abbreviation">
                                <div class="invalid-feedback">
                                    {{ $errors->first('abbreviation') }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex">
                            <div class="form-buttons ml-auto">
                            <a type="cancel" href="{{ route('states.index') }}" class="btn btn-default">Cancel</a>
                            <button type="submit" class="btn btn-primary">Add State</button>
                            </div>
                        </div>                  
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
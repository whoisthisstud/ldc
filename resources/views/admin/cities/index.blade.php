@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="pt-2">
                        <span class="d-inline-block align-text-bottom mt-n2">
                            <a href="{{ route('view.state', [ 'state' => $city->getState->id ]) }}">{{ $city->getState->name }}</a>
                            &nbsp; &raquo; &nbsp;
                        </span>
                        <h5 class="d-inline-block">{{ $city->name }}</h5>
                    </div>
                    <div class="pt-1 ml-auto">
                        <a href="" class="btn btn-sm btn-primary">Add Discount</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
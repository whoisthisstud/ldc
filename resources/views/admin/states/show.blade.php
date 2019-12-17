@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="pt-2">
                        <h5 class="">{{ $state->name }}</h5>
                    </div>
                    <div class="pt-1 ml-auto">
                        <a href="{{ route('cities.create') }}" class="btn btn-sm btn-primary">Add City</a>
                    </div>
                    
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach($state->getStateCities as $city)
                            <li>{{ $city->name }}</li>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
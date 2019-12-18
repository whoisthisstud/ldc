@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header d-flex">
                    <div class="pt-2">
                        <h5 class="d-inline-block">Businesses</h5>
                    </div>
                    <div class="pt-1 ml-auto">
                        <a href="{{ route('businesses.create') }}" class="btn btn-sm btn-primary">Add Business</a>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul>
                        @foreach($businesses as $business)
                            <li><a href="{{ route('view.business', [ 'business' => $business->id ]) }}">{{ $business->name }}</a></li>
                        @endforeach
                    </ul>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('layouts.public')

@section('page-title', '{{ $city->name }}')

@section('content')
    <div class="container">
        <div class="col-12 text-center">
            <div class="d-block">
                <p class="section-title">{{ $city->name }}</p>
            </div>
            <div class="d-block mb-5">
                <a href="#" class="btn btn-large btn-primary">Signup Today!</a>
            </div>

        </div>
        <div class="row pb-5">

            @foreach($city->discounts as $discount)
                <div class="col-12 col-md-4 mb-3 card-hover"><!-- col-lg-3  -->
                    <div class="card">
                        <div class="card-body">

                            <!-- <a href="{{ route('public.discount', [ 'state' => $city->state->name, 'city' => $city->name, 'business' => $discount->business->id, 'discount' => $discount->code ]) }}" class="text-decoration-none"> -->
                                <div class="py-2 px-4">
                                    <div class="business-logo" style="background-image: url({{ $discount->business->logo }});"></div>
                                </div>
                            <!-- </a> -->

                        </div>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="col-12 text-center">
            <div class="d-block mb-3">
                <a href="#" class="btn btn-large btn-primary">Signup Today!</a>
            </div>
        </div>
    </div>
@endsection

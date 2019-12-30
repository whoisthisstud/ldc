@extends('layouts.public')

@section('page-title', '{{ $city->name }}')

@section('content')
    <div class="container">
        <div class="col-12 text-center">
            <div class="d-block">
                <p class="section-title">{{ $city->name }}, <a href="#" class="section-title-state-link">{{ $city->state->abbreviation }}</a></p>
            </div>
        </div>

        @include('_partials.signup-button')

        <div class="row pb-5">
            <div class="col-12 pb-3">
                <h3 class="text-center">Businesses w/ Exclusive Discounts in {{ $city->name }}</h3>
            </div>


            @forelse($city->discounts as $discount)
                <div class="col-12 col-md-4 mb-3 card-hover"><!-- col-lg-3  -->
                    <div class="card">
                        <div class="card-body">

                            <!-- <a href="{{ route('public.discount', [ 'state' => $city->state->name, 'city' => $city->name, 'business' => $discount->business->id, 'discount' => $discount->code ]) }}" class="text-decoration-none"> -->
                                <div class="py-2 px-4">
                                    @if( ! empty( $discount->business->logo ) )
                                    <div class="business-logo" style="background-image: url({{ $discount->business->logo }});"></div>
                                    @else
                                    
                                    <div class="business-logo" style="">
                                        <h3 class="h3 text-center">{{ $discount->business->name }}</h3>
                                    </div>
                                    @endif

                                </div>
                            <!-- </a> -->

                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h5 class="my-5">No businesses signed up!</h5>
                </div>
            @endforelse

        </div>

        @include('_partials.signup-button')

        <div id="city-faq" class="col-12 py-5 text-center">
            <h3 class="text-center pb-3 mb-3 border-bottom d-inline-block">Frequently Asked Questions</h3>
            <div class="faq">
                <div class="container">
                    <div class="row">
                        @foreach($faqs as $faq)
                            <div class="col-12 col-md-4 text-left py-2 px-4">
                                <h5><strong>{{ $faq->question }}</strong></h5>
                                <p class="">{{ $faq->answer }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        @include('_partials.signup-button')

    </div>
@endsection

@extends('layouts.public')

@section('page-title')
{{ $city->name }}, {{ $city->state->abbreviation }}
@endsection

@section('content')
    <div id="cityCarousel" class="carousel slide" data-ride="carousel" style="">
        <div class="carousel-inner">
            <div class="carousel-item active" style="background-image: url({{ !empty($city->media->first()) ? Storage::url($city->media->first()->getUrl('d-banner')) : Storage::url('/images/city/israel-sundseth-BYu8ITUWMfc-unsplash.jpg') }}); background-size: cover; background-position: center;">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-12 z-10 text-xs-center text-center">
                            <div class="d-block">
                                <p class="city-header-text">{{ $city->name }}, <a href="#" class="section-title-state-link">{{ $city->state->abbreviation }}</a></p>
                                
                                @if( $city->is_active == true )
                                    @include('_partials.buttons.signup-button-sm')
                                @endif
                            </div>      
                        </div>
                    </div>

                </div>
                <div class="img-cover"></div>
            </div>
                
        </div>
    </div>

    @if( $city->is_active != true )
        <div class="container coming-soon-container">
            <div class="row">
                <div class="col-12">
                    <div class="coming-soon-text-wrapper">
                        <!-- <h5 class="text-left text-center-md">Coming Soon!</h5> -->
                        <p class=""><strong>Coming Soon!</strong></p>
                        <p class="">{{ $city->name }}, {{ $city->state->name }} is not currently available for membership. Signup below to get notified when you can download this city's Club Card.</p>
                    </div>
                        
                    <div class="jumbotron notify-jumbotron bg-primary text-light shadow">
                        <h5>Notify Me!</h5>
                        <p class="">We promise not to spam your email.</p>
                        <form id="cityNotifyForm" action="" method="POST">
                            <input hidden="" name="city_id" value="{{ $city->id }}">
                            <!-- <input type="email" required="" class="form-control" name="email"> -->
                            <div class="input-group mb-1">
                                <input type="email" name="email" required="" class="form-control" placeholder="you@youremail.com" aria-label="Email Address" aria-describedby="submitNotifyForm">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-badge" type="button" id="submitNotifyForm">Notify Me!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container pt-5">
            <!-- <div class="col-12 text-center">
                <div class="d-block">
                    <p class="section-title">{{ $city->name }}, <a href="#" class="section-title-state-link">{{ $city->state->abbreviation }}</a></p>
                </div>
            </div> -->

            <div class="row pb-5">
                <div class="col-12 pb-3">
                    <h3 class="text-center">Businesses w/ Exclusive Discounts in {{ $city->name }}</h3>
                </div>


                @forelse($city->discounts as $discount)
                    <div class="col-12 col-sm-4 col-md-4 mb-3 card-hover"><!-- col-lg-3  -->
                        <div class="card">
                            <div class="card-body">

                                <!-- <a href="{{ route('public.discount', [ 'state' => $city->state->name, 'city' => $city->name, 'business' => $discount->business->id, 'discount' => $discount->code ]) }}" class="text-decoration-none"> -->
                                    <div class="py-2 px-sm-2 px-4">
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
        </div>
    @endif

    @if( $city->is_active == true )
        @include('_partials.buttons.signup-button-lg')
    @endif

    @if( $faqs->count() > 0 )
    <div id="city-faq" class="col-12 py-5 text-center">
        <h3 class="text-center pb-3 mb-3 border-bottom d-inline-block">Frequently Asked Questions</h3>
        <div class="faq">
            <div class="container">
                <div class="row">
                    @foreach($faqs as $faq)
                        <div class="col-12 col-sm-6 col-md-4 text-left py-2 px-4">
                            <h5><strong>{{ $faq->question }}</strong></h5>
                            <p class="">{!! $faq->answer !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endif

    @if( $city->is_active == true )
        @include('_partials.buttons.signup-button-lg')
    @endif

@endsection

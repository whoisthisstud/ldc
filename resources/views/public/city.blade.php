@extends('layouts.public')

@section('page-title')
{{ $city->name }}, {{ $city->state->abbreviation }}
@endsection

@section('content')
<div id="pageHeader" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 text-center pt-5">
            <div class="page-header-bkgd" style="opacity:.85;">
                @include('_partials.icons.dinner_primary')
            </div>
            @if( $city->is_active == true )
                <div class="select-city-icon-svg">
                    @include('_partials.icons.city-skyline_multi')
                    <span class="city-icon-text">Select your city</span>
                </div>
            @else
                <div class="coming-soon-badge">
                    Coming Soon!
                </div>
            @endif
            <h1 class="contact-header-text mb-4">{{ $city->name }}, {{ $city->state->abbreviation }}</h1>

            <!-- <div class="social-media-shares">
                <ul class="social-share-list">
                    {!! Share::currentPage()->facebook() !!}
                </ul>
            </div> -->

            <div id="shareWrapper">
                <input type="checkbox" class="share-checkbox" id="share" />
                <label for="share" class="share-label export">
                    <i class="fa fa-share mr-2" aria-hidden="true"></i>
                    Share to
                </label>
                <div class="social">
                    <ul class="shadow-5">
                        {!! Share::currentPage()->twitter()->facebook()->linkedin()->pinterest() !!}    
                    </ul>
                </div>
            </div>
            
            @if( $city->is_active == true )
                @include('_partials.buttons.signup-button')
            @else
                <div class="sub-text">
                    Fayetteville, AR is not yet open for membership. Check back regularly for availability or <strong>signup below to be notified when registration opens</strong>.
                </div>
            @endif
            <div class="city-bkgd-ldc-card" style="opacity: .05;">
                @include('_partials.icons.ldc_card_light_contact')
            </div>
        </div>
    </div>
</div>

    @if( $city->is_active != true )
        <div class="container coming-soon-container mb-5">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-10 col-md-6">
                    <div class="coming-soon-text-wrapper">

                        <form id="cityNotifyForm" action="{{ route('mc.notify.city', ['state' => $city->state->id, $city ]) }}" method="POST">
                            @csrf
                            <div class="input-group mb-1 shadow-5">
                                <input type="email" name="email" required="" class="form-control" placeholder="you@youremail.com" aria-label="Email Address" aria-describedby="submitNotifyForm">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="submit" id="submitNotifyForm">Notify Me!</button>
                                </div>
                            </div>
                        </form>
                        <p class="city-notify-subtext">*We don't like spam either. We'll notify you when this city is available and nothing else.</p>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="container pt-5">

            <!-- start: city discount businesses -->
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 pb-5">

                <div class="col-12 col-sm-12 col-md-12 pb-3 text-center">
                    <h3 class="city-header text-center">Businesses w/ Exclusive Discounts in {{ $city->name }}</h3>
                </div>

                @forelse($discounts as $discount)
                    <div class="col px-0 card-hover"><!-- col-lg-3  -->
                        <div class="card business-display">
                            <div class="card-body" rel="tooltip"

                            @if( Auth::user() && Auth::user()->cities->first() )
                                @if( Auth::user()->cities->count() > 0 )
                                    {{-- @if( in_array($city->id, Auth::user()->cities->toArray()) === true )
                                        data-toggle="tooltip" data-html="true" data-trigger="hover focus" title="Click to view <b class='text-primary'>{{ $discount->business->name }}</b>'s discount."
                                    @else
                                        data-toggle="tooltip" data-html="true" data-trigger="hover focus" title="Add this city to your account and start saving at {{ $discount->business->name }} today."
                                    @endif --}}

                                    @foreach( Auth::user()->cities as $subscribedTo )
                                        @if( $subscribedTo->id === $city->id )
                                            data-toggle="tooltip" data-html="true" data-trigger="hover focus" title="Click to view <b class='text-primary'>{{ $discount->business->name }}</b>'s discount."
                                        @endif
                                    @endforeach
                                @else
                                    data-toggle="tooltip" data-html="true" data-trigger="hover focus" title="Download your card and start saving at <b class='text-primary'>{{ $discount->business->name }}</b> today."
                                @endif
                            @else
                                data-toggle="tooltip" data-html="true" data-trigger="hover focus" title="Download your card and start saving at <b class='text-primary'>{{ $discount->business->name }}</b> today."
                            @endif

                            >

                                @if( Auth::user() && Auth::user()->cities->first() )
                                    @if( Auth::user()->cities->count() > 0 )
                                        @foreach( Auth::user()->cities as $subscribedTo )
                                            @if( $subscribedTo->id === $city->id )

                                                <a href="{{ route('public.discount', [ 'state' => $city->state->name, 'city' => $city->name, 'business' => $discount->business->id, 'discount' => $discount->code ]) }}" class="text-decoration-none">
                                            @else
                                            @endif
                                        @endforeach
                                    @endif
                                @endif
                                    <div class="py-2 px-sm-2 px-4">
                                        @if( ! empty( $discount->business->logo ) )
                                        <div class="business-logo" style="background-image: url({{ $discount->business->logo }});"></div>
                                        @else

                                        <div class="business-logo" style="">
                                            <span class="h3 text-center">{{ $discount->business->name }}</span>
                                        </div>
                                        @endif

                                    </div>
                                @if( Auth::user() && Auth::user()->cities->first() )
                                    @if( Auth::user()->cities->count() > 0 )
                                        @foreach( Auth::user()->cities as $subscribedTo )
                                            @if( $subscribedTo->id === $city->id )
                                                </a>
                                            @else
                                            @endif
                                        @endforeach
                                    @endif
                                @endif

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h5 class="my-5">No businesses signed up!</h5>
                    </div>
                @endforelse

            </div>
            <!-- end: city discount businesses -->
        </div>
    @endif

    @if( $city->is_active == true )
        @include('_partials.buttons.signup-button')
    @endif

    @if( $faqs->count() > 0 )
    <div id="city-faq" class="col-12 py-5 text-center">
        <h3 class="text-center pb-3 mb-5 border-bottom d-inline-block">Frequently Asked Questions</h3>
        <div class="faq">
            <div class="container">
                <div class="row">
                    @foreach($faqs as $faq)
                        <div class="col-12 col-sm-6 col-md-4 text-left py-2 px-4">
                            <h5><strong>{{ $faq->question }}{{ substr($faq->question,-1) !== '?' ? '?' : '' }}</strong></h5>
                            <p class="">{!! $faq->answer !!}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <p class="easy-last-call pt-3 border-top d-inline-block mt-4">Still curious?  Check out our <a href="{{ route('public.faqs') }}">Frequently Asked Questions</a>.</p>
    </div>
    @endif

    @if( $city->is_active == true )
        @include('_partials.buttons.signup-button')
    @endif

@endsection

@section('scripts')
<script src="{{ asset('js/share.js') }}"></script>
@endsection
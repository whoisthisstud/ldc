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
                            <div class="d-block page-header">
                                <!-- <p class="city-header-text">{{ $city->name }}, <a href="#" class="section-title-state-link">{{ $city->state->abbreviation }}</a></p> -->
                                <p class="city-header-text">{{ $city->name }}, {{ $city->state->abbreviation }}</p>
                                
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
                <div class="col-12 col-sm-6">
                    <div class="coming-soon-text-wrapper">
                        <!-- <h5 class="text-left text-center-md">Coming Soon!</h5> -->
                        <p class=""><strong>Coming Soon!</strong></p>
                        <p class="">{{ $city->name }}, {{ $city->state->name }} is not currently available for membership. Signup to get notified when you can download this city's Club Card.</p>
                    </div> 
                    
                </div>
                <div class="col-12 col-sm-6">

                    <div class="jumbotron notify-jumbotron bg-primary text-light shadow">
                        <h5>Notify Me!</h5>
                        <p class="">We promise not to spam your email.</p>
                        <form id="cityNotifyForm" action="{{ route('mc.notify.city', ['state' => $city->state->id, $city ]) }}" method="POST">
                            @csrf
                            <div class="input-group mb-1">
                                <input type="email" name="email" required="" class="form-control" placeholder="you@youremail.com" aria-label="Email Address" aria-describedby="submitNotifyForm">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-badge" type="submit" id="submitNotifyForm">Notify Me!</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    @else
        <div class="container pt-5">
            <!-- <div class="row pb-5">

                <div class="col-12 pb-3">
                    <h3 class="text-center">Businesses w/ Exclusive Discounts in {{ $city->name }}</h3>
                </div>

                @forelse($city->discounts as $discount)
                    <div class="col-6 col-sm-4 col-md-4 mb-3 card-hover">
                        <div class="card">
                            <div class="card-body">

                                <!-- <a href="{{ route('public.discount', [ 'state' => $city->state->name, 'city' => $city->name, 'business' => $discount->business->id, 'discount' => $discount->code ]) }}" class="text-decoration-none"> --
                                    <div class="py-2 px-sm-2 px-4">
                                        @if( ! empty( $discount->business->logo ) )
                                        <div class="business-logo" style="background-image: url({{ $discount->business->logo }});"></div>
                                        @else
                                        
                                        <div class="business-logo" style="">
                                            <h3 class="h3 text-center">{{ $discount->business->name }}</h3>
                                        </div>
                                        @endif

                                    </div>
                                <!-- </a> --

                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <h5 class="my-5">No businesses signed up!</h5>
                    </div>
                @endforelse

            </div> -->

            <!-- start: testing -->
            <div class="row row-cols-2 row-cols-sm-3 row-cols-md-5 pb-5">

                <div class="col-12 col-sm-12 col-md-12 pb-3 text-center">
                    <h3 class="city-header text-center">Businesses w/ Exclusive Discounts in {{ $city->name }}</h3>
                </div>
                
{{-- @php $userCitiesArray = Auth::user()->cities->toArray() @endphp
@dd( $userCitiesArray[0]['pivot']['city_id'] ) --}}  

                @forelse($city->discounts as $discount)
                    <div class="col px-0 card-hover"><!-- col-lg-3  -->
                        <div class="card business-display">
                            <div class="card-body" rel="tooltip" data-toggle="tooltip" data-html="true" data-trigger="hover focus" title="

                            @if( Auth::user() && Auth::user()->cities->first() )
                                @if( Auth::user()->cities->count() > 0 )
                                    {{-- @if( in_array($city->id, Auth::user()->cities->toArray()) === true )
                                        Click to view <b class='text-primary'>{{ $discount->business->name }}</b>'s discount.
                                    @else
                                        Add this city to your account and start saving at {{ $discount->business->name }} today.
                                    @endif --}}

                                    @foreach( Auth::user()->cities as $subscribedTo )
                                        @if( $subscribedTo->id === $city->id )
                                            Click to view <b class='text-primary'>{{ $discount->business->name }}</b>'s discount.
                                        @endif
                                    @endforeach
                                @else
                                    Download your card and start saving at <b class='text-primary'>{{ $discount->business->name }}</b> today.
                                @endif
                            @else
                                Download your card and start saving at <b class='text-primary'>{{ $discount->business->name }}</b> today.
                            @endif

                            ">

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
            <!-- end: testing -->
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

@section('scripts')
<!-- <script>
    $(document).ready(function() {

        $(function () {
            $('[data-toggle="tooltip"]').tooltip({
               html: true, 
               placement: 'top'
            });
        });

    });
</script> -->
@endsection
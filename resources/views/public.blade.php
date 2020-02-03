@extends('layouts.public')

@section('page-title', 'Home')

@section('content')
<div id="pageHeader" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 text-center page-header-wrapper">
            <!-- <div class="contact-header-bkgd"></div> -->
            <div class="page-header-bkgd" style="opacity:.85;">
                @include('_partials.icons.dinner_primary')
            </div>

            <div id="myCarousel" class="carousel slide" data-ride="carousel" style="">
				<!-- <ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1" class=""></li>
					<li data-target="#myCarousel" data-slide-to="2" class=""></li>
				</ol> -->
				<div class="carousel-inner">
					<div class="carousel-item active">
						<div class="container">
							<div class="row justify-content-between">
								<div class="col-12 col-sm-5 col-md-5 z-10 animated slideInUp" style="z-index: 12 !important;">
									<div class="carousel-graphic-wrapper large">
										@include('_partials.icons.ldc_card_front_color')
										<div class="card-front-shadow"></div>
									</div>
								</div>
								<div class="col-12 col-sm-7 col-md-6 z-10 text-xs-center text-left">
									<p class="display-4 carousel-header" style="">Exclusive Local Discounts</p>
									<p class="lead carousel-lead" style="">
										Each city's club card has fifteen exclusive and reusable discounts that you can redeem every single day at establishments near you. The best part?</p>
									<p class="carousel-emphasis text-uppercase text-center text-md-left" style="">Membership is free!</p>
									<a class="btn btn-lg btn-primary carousel-btn" href="#popular" role="button" style="">Start Saving</a>
									<a class="btn btn-link more-link" href="#easyPeasy" role="button">Tell me more!</a>
								</div>
							</div>

						</div>
					</div>

				</div>
			</div>
			<div class="scroller-arrow animated bounce slower infinite">
				<a href="#easyPeasy">
					@include('_partials.icons.double-arrow-down_primary')
				</a>
			</div>

            <div class="page-bkgd-ldc-card">
                @include('_partials.icons.ldc_card_light_contact')
            </div>

        </div>
    </div>
</div>

<div id="easyPeasy" class="container">
	<div class="row justify-content-center">
		<div class="col-10 col-md-12 text-center">

            <div class="section-header-svg">
                @include('_partials.icons.easy-snap_multi')
            </div>
			<h2>It's this easy..</h2>

			<div class="jumbotron easy-jumbotron">
				<div class="row row-cols-1 row-cols-sm-3 row-cols-md-5">

					<div class="col pick-city-col pb-5">
						<div class="icon-btn-svg">
							@include('_partials.icons.city-skyline_multi')
						</div>
						<h4 class="">Select your city</h4>
                        <p>Start by selecting a city. Here you can view the businesses offering discounts and links to register for a card.</p>
					</div>
					<div class="col register-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.request-card_multi')
						</div>
						<h4 class="">Register for membership</h4>
                        <p>From any city, click the registration button to fill out a simple form. This will create an account with LDC and send a verification email to you.</p>
					</div>
					<div class="col verify-email-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.verify-email_multi')
						</div>
						<h4 class="">Verify your email</h4>
                        <p>Once you've registered, you will need to confirm your email by clicking on the button in the confirmation email.</p>
					</div>
					<div class="col download-card-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.select-discount_multi')
						</div>
						<h4 class="">Select a discount</h4>
                        <p>Once verified, login to your member profile to access your city's discounts. Select desired discount.</p>
					</div>
					<div class="col redeem-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.show-discount_multi')
						</div>
						<h4 class="">Show discount to redeem</h4>
                        <p>Show the discount to participating business to redeem.</p>
					</div>

				</div>
			</div>

			<h4 class="easy-subtext">Easy peasy, lemon squeezy!</h4>
			<a href="#popular" class="btn btn-lg btn-primary text-white easy-btn px-5">Select your city</a>
			<p class="easy-last-call">Want to learn more?  Check out our <a href="{{ route('public.faqs') }}">Frequently Asked Questions</a>.</p>
		</div>
	</div>
</div>

<div id="popular" class="album">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-12 text-center">
                <div class="section-header-svg">
                	{{-- @include('_partials.icons.map_multi') --}}
	                @include('_partials.icons.city-skyline_multi')
                </div>
                <h2>Select your city</h2>
			</div>

			@forelse($cities as $city)
				<div class="col-12 col-sm-4 col-md-4">
					<div class="card popular-city-card mb-4 pb-4 p-2 shadow-sm" style="">
						<img class="card-bg-img" src="{{ !empty($city->media->first()) ? Storage::url($city->media->first()->getUrl('thumb')) : Storage::url('/images/city/israel-sundseth-BYu8ITUWMfc-unsplash.jpg') }}" alt="Select {{ $city->name }}, {{ $city->state->abbreviation }} as your city.">
						<a href="{{ route('public.city', [ 'state' => $city->state->name, 'city' => $city->name ]) }}">
							<div class="card-body">
								<div class="center-within">
									<h2 class="city-name text-center">{{ $city->name }}</h2>
									<p class="city-state-name text-center">{{ $city->state->name }}</p>
								</div>
							</div>
						</a>
					</div>
				</div>
			@empty
                <div class="col-12 text-center">
                    <h2>Coming February 2020!</h2>
                </div>
			@endforelse

			@if( $cities->count() > 8 )
				<div class="col-12 mt-3 text-center all-cities-btn">
					<a href="{{ route('public.cities.list') }}" class="btn btn-lg btn-primary text-light text-center px-5">View all cities</a>
				</div>
			@endif
			@if( $cities->count() > 0 && $cities->count() < 8 )
				<div class="col-12 mt-3 text-center">
					<h3>More cities coming throughout 2020.</h3>
				</div>
			@endif

		</div> <!-- end: row -->
	</div>
</div>
<section id="markets" class="">
    <div class="divider-top-container">
        @include('_partials.icons.divider1')
    </div>
	<div class="container">
		<div class="row">

			<div class="col-12 market-content">
				<h2>Savings</h2>
				<p class="header-smaller">where you need it</p>
				<p class="sub-header">We work hard every day to bring you exclusive savings from establishments near you, such as:</p>
				<div id="segments" class="row row-cols-1 row-cols-md-3">
					<ul class="col">
						<li>Restaurants</li>
						<li>Coffee Shops</li>
						<li>Hair & Nail Salons</li>
						<li>Chiropractors</li>
					</ul>
					<ul class="col">
						<li>Masseuses & Spas</li>
						<li>Car Washes</li>
						<li>Oil Changes</li>
						<li>Bakeries</li>
					</ul>
					<ul class="col">
						<li>Meat Markets</li>
						<li>Entertainment Venues </li>
						<li>Dog Groomers</li>
						<li>Photography Studios</li>
					</ul>
				</div>
				<div class="section-background" style="">
	                @include('_partials.icons.corn-dogs_multi')
	            </div>
	            <div class="col-12 mt-5 text-center">
					<a href="{{ route('public.cities.list') }}" class="btn btn-primary text-light text-center mt-3 px-5">Sign up for free!</a>
				</div>
				<div class="col-12 mt-5 text-center noted">
					<span class="text-muted">*Each city's <em>Club Card Partners</em>, and their associated discounts, may vary from city to city.<br>The business types, listed above, may or may not participate in your city's <strong>Club Card</strong> program.</span>
				</div>
			</div>

		</div>
	</div>
</section>
@endsection

@section('scripts')
<!-- <script>
$(document).ready(function(){
    // Add smooth scrolling to all links
    $("a").on('click', function(event) {
        if (this.hash !== "") {
            event.preventDefault();
            var hash = this.hash;
            $('html, body').animate({
                scrollTop: $(hash).offset().top
            }, 800, function(){
                window.location.hash = hash;
            });
        } // End if
    });
});
</script> -->
@endsection

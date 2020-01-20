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
					<div class="carousel-item active"> <!-- style="background-image: url({{ asset('i/restaurant-bg.jpg') }}); background-size: cover; background-position: center;" alt="Photo by Kenny Luo on Unsplash" -->
						<div class="container">
							<div class="row justify-content-between">
								<div class="col-12 col-sm-5 col-md-5 z-10 animated slideInUp">
									<div class="carousel-graphic-wrapper large">
										@include('_partials.icons.ldc_card_front_color')
										<div class="card-front-shadow"></div>
									</div>
								</div>
								<div class="col-12 col-sm-7 col-md-6 z-10 text-xs-center text-left">
									<p class="display-4 carousel-header" style="">Exclusive Local Discounts</p>
									<p class="lead carousel-lead" style="">
										With our club card, you have fifteen exclusive reusable coupons that can be redeemed every single day at establishments near you. The best part?</p>
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

			<h2>It's this easy..</h2>

			<div class="jumbotron easy-jumbotron">
				<div class="row row-cols-1 row-cols-sm-3 row-cols-md-5">

					<div class="col pick-city-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.city-skyline_multi')
						</div>
						<h4 class="">Select your city</h4>
					</div>
					<div class="col register-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.request-card_multi')
						</div>
						<h4 class="">Register for the card</h4>
					</div>
					<div class="col verify-email-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.verify-email_multi')
						</div>
						<h4 class="">Verify your email</h4>
					</div>
					<div class="col download-card-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.download-card_multi')
						</div>
						<h4 class="">Download your card</h4>
					</div>
					<div class="col redeem-col">
						<div class="icon-btn-svg">
							@include('_partials.icons.business-card_multi')
						</div>
						<h4 class="">Show card to redeem</h4>
					</div>

				</div>
			</div>

			<h4 class="easy-subtext">Easy peasy, lemon squeezy!</h4>
			<a href="#popular" class="btn btn-lg btn-primary text-white easy-btn">Select your city</a>
			<p class="easy-last-call">Want to learn more?  Check out our <a href="{{ route('public.faqs') }}">Frequently Asked Questions</a>.</p>
		</div>
	</div>
</div>

<div id="popular" class="album pt-5">
	<div class="container">
		<div class="row justify-content-center pb-5">
			<div class="col-12 text-center">
				<p class="section-title">Select your city</p>
			</div>


			@forelse($cities as $city)
				<div class="col-12 col-sm-4 col-md-4">
					<div class="card popular-city-card mb-4 pb-4 p-2 shadow-sm" style="">
						<img class="card-bg-img" src="{{ !empty($city->media->first()) ? Storage::url($city->media->first()->getUrl('thumb')) : Storage::url('/images/city/israel-sundseth-BYu8ITUWMfc-unsplash.jpg') }}">
						<a href="{{ route('public.city', [ 'state' => $city->state->name, 'city' => $city->name ]) }}">
							<div class="card-body">
								<div class="center-within">
									<h1 class="city-name text-center">{{ $city->name }}</h1>
									<p class="city-state-name text-center">{{ $city->state->name }}</p>
									<!-- <p class="city-discount-count text-center m-0">
										<small class="text-light">{{ $city->discounts_count }} Discounts</small>
									</p> -->
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
					<a href="{{ route('public.cities.list') }}" class="btn btn-lg btn-primary text-light text-center">View All Cities</a>
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


@endsection

@section('scripts')
<script>
$(document).ready(function(){
  // Add smooth scrolling to all links
  $("a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 800, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});
</script>
@endsection
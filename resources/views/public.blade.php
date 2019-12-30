@extends('layouts.public')

@section('page-title', 'Home')

@section('content')
	<div id="myCarousel" class="carousel slide" data-ride="carousel" style="">
		<!-- <ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		</ol> -->
		<div class="carousel-inner">
			<div class="carousel-item active" style="background-image: url(https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80); background-size: cover; background-position: center;">
				<div class="container">
					<div class="row justify-content-between">
						<div class="col-12 col-md-5 z-10 animated slideInUp">
							<div class="carousel-graphic-wrapper large">
								@include('_partials.icons.ldc_card_dark')
							</div>
						</div>
						<div class="col-12 col-md-6 z-10 text-xs-center text-right">
							<p class="display-4"><strong>Exclusive Local Discounts</strong></p>
							<p class="lead">Members receive exclusive discounts to local establishments. These discounts are not available anywhere else. <br><strong class="text-uppercase">Membership is free!</strong> </p>
							<a class="btn btn-lg btn-primary" href="#popular" role="button">Pick your city</a>
							<!-- <a class="btn btn-lg btn-primary" href="#" role="button">Sign me up for this free membership!</a> -->
						</div>
					</div>

				</div>
				<div class="img-cover"></div>
			</div>
			<!-- <div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1571597438372-540dd352bf41?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80); background-size: cover; background-position: center;">
				<div class="container">
					<div class="text-left z-10">
						<p class="display-4"><strong>Another Short Impactful Headline.</strong></p>
						<p class="lead">Something short and leading about the what you do. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
						<a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a>
					</div>
				</div>
				<div class="img-cover"></div>
			</div>
			<div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1560472355-536de3962603?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80); background-size: cover; background-position: center;">
				<div class="container">
					<div class="z-10">
						<p class="display-4"><strong>One more for good measure.</strong></p>
						<p class="lead">Something short and leading about the what you do. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
						<a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a>
					</div>
				</div>
				<div class="img-cover"></div>
			</div> -->
		</div>
	</div>

	<div id="popular" class="album py-5">
		<div class="container">
			<div class="row justify-content-center pb-5">
				<div class="col-12 text-center">
					<p class="section-title">Pick your city</p>
				</div>


				@forelse($cities as $city)
					<div class="col-12 col-sm-6 col-md-4">
						<div class="card popular-city-card mb-4 pb-4 p-2 shadow-sm" style="">

							<a href="{{ route('public.city', [ 'state' => $city->state->name, 'city' => $city->name ]) }}">
								<div class="card-body" style="min-height: 200px;">
									<div class="center-within">
										<h1 class="city-name text-center">{{ $city->name }}</h1>
										<p class="city-state-name text-center">{{ $city->state->name }}</p>
										<p class="city-discount-count text-center m-0">
											<small class="text-light">{{ $city->discounts_count }} Discounts</small>
										</p>
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

				@if( $cities->count() > 9 )
					<div class="col-12 mt-3 text-center">
						<a class="btn btn-lg btn-primary text-light text-center">View More Cities</a>
					</div>
				@endif
				@if( $cities->count() > 0 && $cities->count() < 10 )
					<div class="col-12 mt-3 text-center">
						<h3>More cities coming through 2020.</h3>
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

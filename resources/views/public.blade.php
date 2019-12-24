@extends('layouts.public')

@section('page-title', 'Home')

@section('content')
	<div id="myCarousel" class="carousel slide" data-ride="carousel" style="">
		<ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1" class=""></li>
			<li data-target="#myCarousel" data-slide-to="2" class=""></li>
		</ol>
		<div class="carousel-inner">
			<div class="carousel-item active" style="background-image: url(https://images.unsplash.com/photo-1441986300917-64674bd600d8?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80); background-size: cover; background-position: center;">
				<div class="container">
					<div class="row">
						<div class="col-12 col-md-5 carousel-graphic animated slideInUp">
							<div class="carousel-graphic-wrapper">
								@include('_partials.icons.ldc_card_dark')
							</div>
						</div>
						<div class="col-12 col-md-5 carousel-caption text-right">
								<h1>Short Impactful Headline.</h1>
								<p>Something short and leading about the what we do. Short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
								<p><a class="btn btn-lg btn-primary" href="#" role="button">Browse Discounts</a></p>
							</div>
					</div>

				</div>
				<div class="img-cover"></div>
			</div>
			<div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1571597438372-540dd352bf41?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80); background-size: cover; background-position: center;">
				<div class="container">
					<div class="carousel-caption text-left">
						<h1>Another Short Impactful Headline.</h1>
						<p>Something short and leading about the what you do. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
						<p><a class="btn btn-lg btn-primary" href="#" role="button">Sign up today</a></p>
					</div>
				</div>
				<div class="img-cover"></div>
			</div>
			<div class="carousel-item" style="background-image: url(https://images.unsplash.com/photo-1560472355-536de3962603?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1950&q=80); background-size: cover; background-position: center;">
				<div class="container">
					<div class="carousel-caption">
						<h1>One more for good measure.</h1>
						<p>Something short and leading about the what you do. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
						<p><a class="btn btn-lg btn-primary" href="#" role="button">Learn more</a></p>
					</div>
				</div>
				<div class="img-cover"></div>
			</div>
		</div>
	</div>

	<div class="album py-5 bg-light">
		<div class="container">
			<div class="row pb-5">
				<div class="col-12 text-center">
					<p class="section-title">Pick your city</p>
				</div>


				@foreach($cities as $city)
					<div class="col-12 col-sm-6 col-md-4">
						<div class="card mb-4 pb-4 p-2 shadow-sm bg-secondary">
							<a href="{{ route('public.city', [ 'state' => $city->state->name, 'city' => $city->name ]) }}">
								<div class="card-body" style="min-height: 200px;">
									<div class="center-within">
										<h4 class="text-center text-light">{{ $city->name }}, {{ $city->state->abbreviation }}</h4>
										<p class="text-center m-0">
											<small class="text-light">@php echo rand(0,28) @endphp Discounts</small>
										</p>
									</div>
								</div>
							</a>
						</div>
					</div>
				@endforeach

				<div class="col-12 mt-3 text-center">
					<a class="btn btn-lg btn-primary text-light text-center">View More Cities</a>
				</div>

			</div> <!-- end: row -->
		</div>
	</div>
@endsection



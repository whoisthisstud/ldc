<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<title>Local Discount Club | Home</title>

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />
		
		<!-- Bootstrap core CSS -->
		<link href="{{ asset('css/app.css') }}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<link href="{{ asset('css/custom.css') }}" rel="stylesheet">

		<!-- Favicons -->
		<meta name="theme-color" content="#563d7c">
	</head>

	<body>
		
		@include('_partials.menus.public-menu')

		<main class="hidden-footer" role="main">

			<!-- <section class="jumbotron text-center">
				<div class="container">
					<h1>Short Impactful Headline</h1>
					<p class="lead text-muted">Something short and leading about the what you do. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>
					<p>
						<a href="#" class="btn btn-primary my-2">Do Something</a>
						<a href="#" class="btn btn-secondary my-2">Do Something Else</a>
					</p>
				</div>
			</section> -->

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
							<p class="section-title">Pick your city</h3>
						</div>
						

						@foreach($cities as $city)
							<div class="col-12 col-sm-6 col-md-4">
								<div class="card mb-4 pb-4 p-2 shadow-sm bg-secondary">
									<a href="#">
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

		</main>

		<footer class="text-muted bg-dark">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-9">
						<a href="#" class="display-4 d-flex align-items-center text-light" style="font-size: 2rem;">
							<div class="footer-logo-wrapper">
								@include('_partials.icons.ldc_card_dark')
							</div>
							
							<strong>{{ config('app.name', 'Local Discount Club') }}</strong>
						</a>
					</div>
				</div>
				<!-- <p class="float-right">
					<a href="#">Back to top</a>
				</p>
				<p>Album example is &copy; Bootstrap, but please download and customize it for yourself!</p>
				<p>New to Bootstrap? <a href="https://getbootstrap.com/">Visit the homepage</a> or read our <a href="/docs/4.4/getting-started/introduction/">getting started guide</a>.</p> -->
			</div>
		</footer>

		<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
		
		<script src="{{ asset('js/app.js') }}"></script>

		<script>
			var i = 0;
			$('.navbar-toggler').on('click', function() {
				$('body').toggleClass('nav-open');

				if( i == 1 ) {
					$('.open-nav-cover').detach();
				}
				else {
					$('body').append('<div class="open-nav-cover"></div>');
				}	

				i = (i==0 || i=='') ? i=1 : i=0;
			});
		</script>
	</body>
</html>


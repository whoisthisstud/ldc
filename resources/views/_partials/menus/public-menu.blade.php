<header>
	<div class="collapse bg-dark" id="navbarHeader">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-6 py-4">
					<h4 class="text-white">About</h4>
					<p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
				</div>
				<div class="col-sm-12 col-md-3 py-4">
					<h4 class="text-white">Menu</h4>
					<ul class="list-unstyled">
						<li><a href="#" class="text-white">View All Cities</a></li>
						<li><a href="#" class="text-white">View All Discounts</a></li>
						<li><a href="#" class="text-white">Contact Us</a></li>
						<li><a href="#" class="text-white">View All Cities</a></li>
						<li><a href="#" class="text-white">View All Discounts</a></li>
						<li><a href="#" class="text-white">Contact Us</a></li>
						<li><a href="#" class="text-white">Request A City</a></li>
					</ul>
				</div>
				<div class="col-sm-12 col-md-3 py-4">
					<h4 class="text-white">Admin Menu</h4>
					<ul class="list-unstyled">
						@if (Route::has('login'))
			                    @auth
			                        <a href="{{ route('home') }}">Home</a>
			                    @else
			                        <li><a href="{{ route('login') }}">Login</a></li>

			                        @if (Route::has('register'))
			                            <li><a href="{{ route('register') }}">Register</a></li>
			                        @endif
			                    @endauth
			                </div>
			            @endif
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="navbar navbar-dark bg-dark {{ Route::is('public.index') ? 'navbar-transparent' : '' }}">
		<div class="container d-flex justify-content-between">
			<a href="/" class="navbar-brand d-flex align-items-center text-light">
				{{-- @include('_partials.icons.logo2') --}}
				@include('_partials.icons.ldc_card_dark')
				<strong>{{ config('app.name', 'Local Discount Club') }}</strong>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</div>
</header>

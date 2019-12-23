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

	<div class="navbar navbar-dark bg-dark navbar-transparent">
		<div class="container d-flex justify-content-between">
			<!-- <a href="#" class="navbar-brand d-flex align-items-center">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/><circle cx="12" cy="13" r="4"/></svg>
				<strong>Album</strong>
			</a> -->
			<a href="#" class="navbar-brand d-flex align-items-center text-light">
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

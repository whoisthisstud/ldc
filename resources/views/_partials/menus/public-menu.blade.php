<header>
	<div class="collapse bg-dark" id="navbarHeader">
		<div class="container">
			<div class="row">

				<!-- <div class="col-sm-12 col-md-6 py-4">
					<h4 class="text-white">About</h4>
					<p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
				</div> -->

				<!-- start: Public Menu -->
				<div id="publicMenu" class="col-12 py-4 mb-4 px-2 border-bottom" style="border-bottom: 1px solid #2a3137 !important;">
					<ul class="icon-menu d-flex flex-row align-content-center align-items-stretch flex-wrap">

						<li class="">
							<a href="{{ route('public.cities.list') }}" class="icon-btn text-white">
								<!-- <i class="fas fa-home"></i> -->
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.skyline_buildings_duotone')
								</span>
								View All Cities
							</a>
						</li>
						<li class="">
							<a href="#" class="icon-btn text-white" data-toggle="modal" data-target=".cityRequestFormModal">
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.bullhorn_duotone')
								</span>
								Request A City
							</a>
						</li>
						<li class="">
							<a href="#" class="icon-btn text-white" data-toggle="modal" data-target=".businessRequestFormModal">
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.storefront_duotone')
								</span>
								Request A Business
							</a>
						</li>

						<li class="separator d-none d-md-inline-block"></li>

						<li class="">
							<a href="#" class="icon-btn text-white">
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.ldc_card_light-icon')
								</span>
								About Us
							</a>
						</li>
						<li class="">
							<a href="#" class="icon-btn text-white">
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.contact_duotone')
								</span>
								Contact Us
							</a>
						</li>
						<li class="">
							<a href="#" class="icon-btn text-white">
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.lifeline_multi')
								</span>
								FAQs
							</a>
						</li>

						<li class="separator d-none d-md-inline-block"></li>

						@if (Route::has('login'))
		                    @auth
			                    <li class="">
									<a href="{{ route('logout') }}" class="icon-btn text-white"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
										<span class="icon-btn-svg-icon">
											@include('_partials.icons.padlock_unlocked-light_duotone')
										</span>
										Logout
									</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</li>
		                    @else
		                        <li class="">
									<a href="{{ route('login') }}" class="icon-btn text-white">
										<!-- <i class="fas fa-lock"></i> -->
										<span class="icon-btn-svg-icon">
											@include('_partials.icons.padlock_locked-dark_duotone')
										</span>
										Login
									</a>
								</li>
		                    @endauth
			            @endif

					</ul>

				</div>
				<!-- end: Public Menu -->

				@auth
				<!-- start: Admin Menu -->
				<div id="loggedInMenu" class="col-12 pb-4 px-2">
					<ul class="icon-menu d-flex flex-row align-content-center align-items-stretch flex-wrap">
						@can('manage-dashboard')
							<li class="">
								<a href="{{ route('home') }}" class="icon-btn text-white">
									<span class="icon-btn-svg-icon">
										@include('_partials.icons.dashboard_dark-multi')
									</span>
									Dashboard
								</a>
							</li>
							<li class="">
								<a href="{{ route('states.index') }}" class="icon-btn text-white">
									<span class="icon-btn-svg-icon">
										@include('_partials.icons.map_multi')
									</span>
									States
								</a>
							</li>
							<li class="">
								<a href="{{ route('faqs.index') }}" class="icon-btn text-white">
									<span class="icon-btn-svg-icon">
										@include('_partials.icons.lifeline_multi')
									</span>
									FAQ Admin
								</a>
							</li>
						@endcan

						@can('manage-businesses')
							@cannot('manage-dashboard')
								<li class="">
									<a href="{{ route('manager.home') }}" class="icon-btn text-white">
										<span class="icon-btn-svg-icon">
											@include('_partials.icons.dashboard_dark-multi')
										</span>
										Dashboard
									</a>
								</li>
							@endcannot

							<li class="">
								<a href="{{ route('businesses.index') }}" class="icon-btn text-white">
									<span class="icon-btn-svg-icon">
										@include('_partials.icons.storefront_multi')
									</span>
									Businesses
								</a>
							</li>
							<li class="">
								<a href="{{ route('discounts.index') }}" class="icon-btn text-white">
									<span class="icon-btn-svg-icon">
										@include('_partials.icons.discount_multi')
									</span>
									Discounts
								</a>
							</li>
						@endcan

						@can('access-testing')

							<li class="separator d-none d-md-inline-block"></li>

							@if( isset($city) && $city->count() > 0 )
								<li class="">
									<a href="{{ route('public.signup', ['state' => $city->state->name, 'city' => $city->name]) }}" class="icon-btn text-white">
										<span class="icon-btn-svg-icon">
											@include('_partials.icons.business-card_multi')
										</span>
										Request Club Card
									</a>
								</li>
							@endif
						@endcan

					</ul>
				</div>

				@endauth

				<!-- <div class="col-sm-12 col-md-3 py-4">
					<h4 class="text-white">Admin Menu</h4>
					<ul class="list-unstyled">
						@if (Route::has('login'))
		                    @auth
		                    	@can('manage-dashboard')
									<li><a href="{{ route('home') }}">Home</a></li>
									<li><a href="{{ route('states.index') }}">States</a></li>
									<li><a href="{{ route('faqs.index') }}">FAQs</a></li>
								@endcan

								@can('manage-businesses')
									@cannot('manage-dashboard')
										<li><a href="{{ route('manager.home') }}">Dashboard</a></li>
									@endcannot
									<li><a href="{{ route('businesses.index') }}">Businesses</a></li>
									<li><a href="{{ route('discounts.index') }}">Discounts</a></li>
								@endcan

								@can('manage-dashboard')
									@if( isset($city) && $city->count() > 0 )
										<li><a href="{{ route('public.signup', ['state' => $city->state->name, 'city' => $city->name]) }}">Request Club Card</a></li>
									@endif
								@endcan

								<div class="dropdown-divider"></div>
								<li>
									<!-- Logout button --
                                    <a class="" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
								</li>

		                    @else
		                        <li><a href="{{ route('login') }}">Login</a></li>

		                        {{-- @if (Route::has('register'))
		                            <li><a href="{{ route('register') }}">Register</a></li>
		                        @endif --}}

		                        <li><a href="#">Add Your Business</a></li>
		                    @endauth
			            @endif
					</ul>
				</div> -->


			</div>
		</div>
	</div>

	<!-- start: Brand Logo | Site Name -->
	<div class="navbar navbar-dark bg-dark {{ Route::is('public.index') || Route::is('public.city') ? 'navbar-transparent' : '' }}">
		<div class="container d-flex justify-content-between">
			<a href="/" class="navbar-brand d-flex align-items-center text-light">
				{{-- @include('_partials.icons.logo2') --}}
				@include('_partials.icons.ldc_card_light')
				<strong>{{ config('app.name', 'Local Discount Club') }}</strong>
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
		</div>
	</div>
	<!-- end: Brand Logo | Site Name -->

</header>

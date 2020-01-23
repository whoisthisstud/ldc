<header>
	<div class="collapse" id="navbarHeader">
		<div class="container">
			<div class="row">

				<!-- start: Public Menu -->
				<div id="publicMenu" class="col-12 py-4 px-2">
					<ul class="icon-menu d-flex flex-row align-content-center align-items-stretch flex-wrap">
						@if( $active_count && $active_count > 0 )
						<!-- <li id="downloadCard" class="primary-icon-btn">
							<a href="#" class="icon-btn text-white bg-primary">
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.ldc_card_light-icon')
								</span>
								Download Card
							</a>
						</li> -->
						@endif
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

						<!-- <li class="">
							<a href="{{ route('public.about') }}" class="icon-btn text-white">
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.ldc_card_light-icon')
								</span>
								About Us
							</a>
						</li> -->
						<!-- <li class="">
							<a href="{{ route('public.contact') }}" class="icon-btn text-white">
								<span class="icon-btn-svg-icon">
									@include('_partials.icons.contact_duotone')
								</span>
								Contact Us
							</a>
						</li> -->
						<li class="">
							<a href="{{ route('public.faqs') }}" class="icon-btn text-white">
								<span class="icon-btn-svg-icon">
									{{--  @include('_partials.icons.lifeline_multi') --}}
									@include('_partials.icons.qa_multi2')
								</span>
								FAQs
							</a>
						</li>

						<li class="separator d-none d-md-inline-block"></li>

						@if (Route::has('login'))
		                    @auth
			                    <li class="">
									<a href="{{ route('view.profile',['user' => Auth::id()]) }}" class="icon-btn text-white">
										<span class="icon-btn-svg-icon">
											@include('_partials.icons.user-profile_multi')
										</span>
										View Profile
									</a>
								</li>
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
				<div id="loggedInMenu" class="col-12 pt-4 pb-2 px-2 border-top" style="border-top: 1px solid #2a3137 !important;">
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
							<li class="">
								<a href="{{ route('test.thanks') }}" class="icon-btn text-white">
									<span class="icon-btn-svg-icon">
										@include('_partials.icons.verify-email_multi')
									</span>
									View Thank You Page
								</a>
							</li>
							<li class="">
								<a href="{{ route('card') }}" class="icon-btn text-white">
									<span class="icon-btn-svg-icon">
										@include('_partials.icons.business-card_multi')
									</span>
									View Club Card
								</a>
							</li>
							@if( isset($city) )
								<li class="">
									<a href="{{ route('public.signup', ['state' => $city->state->name, 'city' => $city->name]) }}" class="icon-btn text-white">
										<span class="icon-btn-svg-icon">
											@include('_partials.icons.easy-snap_multi')
										</span>
										Request Club Card
									</a>
								</li>
							@endif
						@endcan

					</ul>
				</div>
				@endauth

			</div>
		</div>
	</div>

	<!-- start: Brand Logo | Site Name -->
	<div id="navbarMain" class="navbar navbar-dark">
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

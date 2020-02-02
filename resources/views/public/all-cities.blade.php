@extends('layouts.public')

@section('page-title')
All Cities
@endsection

@section('content')
	<div id="contactHeader" class="container-fluid">
	    <div class="row justify-content-center">
	        <div class="col-12 text-center pt-5">
	            <!-- <div class="contact-header-bkgd"></div> -->
	            <div class="contact-header-bkgd" style="opacity:.85;">
	                @include('_partials.icons.dinner_primary')
	            </div>
	            <h1 class="contact-header-text">Local Discount Clubs!</h1>
	            <p class="all-cities-intro">Don't see your city? <a href="#" class="text-decoration-none" data-toggle="modal" data-target=".cityRequestFormModal">Submit a request</a> and we'll start working on bringing discounts to your local area.</p>
	            <div class="contact-page-ldc-card" style="opacity: .05;">
	                @include('_partials.icons.ldc_card_light_contact')
	            </div>
	        </div>
	    </div>
	</div>

	<div class="container pb-4">
		<div class="row justify-content-center">
			<div class="col-12 col-md-10 pt-4 text-center">
				<div class="row">
					<div class="col-12" style="">

						@foreach($states as $state)
							@if( $state->cities->count() > 0 )
								<div id="stateBlock" class="" style="">
									<div class="state-name">
										<h4 class="pl-1">{{ $state->name }}</h4>
									</div>

									<ul class="city-list" style="">

										@foreach($state->cities as $city)
										<li>
											<div class="wrapper">
												<a class="city-link btn-primary btn-badge shadow-3-on-hover" href="{{ route('public.city', [ 'state' => $city->state->name, 'city' => $city->name ]) }}" class="text-decoration-none">
													<span class="name">{{ $city->name }}</span>
												</a>
											</div>
										</li>
										@endforeach

									</ul>
								</div>
							@endif
						@endforeach

					</div>
				</div>
			</div>
		</div>
	</div>

    @if( $faqs->count() > 0 )
    <section id="allCityFaq" style="background-color: #e2ebf0 !important;">
	    <div class="divider-top-container">
	        @include('_partials.icons.divider1')
	    </div>
    	<div class="row">
	    	<div id="city-faq" class="col-12 py-5 text-center">
		        <h3 class="text-center pb-3 mb-5 border-bottom d-inline-block">Frequently Asked Questions</h3>
		        <div class="faq">
		            <div class="container">
		                <div class="row">
		                    @foreach($faqs as $faq)
		                        <div class="col-12 col-sm-6 col-md-4 text-left py-2 px-4">
		                            <h5><strong>{{ $faq->question }}{{ substr($faq->question,-1) !== '?' ? '?' : '' }}</strong></h5>
		                            <p class="">{!! $faq->answer !!}</p>
		                        </div>
		                    @endforeach
		                </div>
		            </div>
		        </div>
		        <p class="easy-last-call pt-3 border-top d-inline-block mt-4">Want to know more?  Check out our <a href="{{ route('public.faqs') }}">FAQ's</a>.</p>
		    </div>
	    </div> 
	    <div class="divider-bottom-container">
	        @include('_partials.icons.divider1')
	    </div>
    </section>    
    @endif

    <div id="moreComing">
    	<div class="row justify-content-center">
    		<div class="col-12 col-md-11 text-center more-coming">
				<h3 class="pb-3">More cities coming throughout {{ now()->year }}</h3>
				<button type="button" class="btn btn-primary py-2 px-5" data-toggle="modal" data-target=".cityRequestFormModal">Request a City</button>
			</div>
    	</div>
    </div>
			

@endsection

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
            <p class="contact-intro">Don't see your city? <a href="#" class="text-decoration-none" data-toggle="modal" data-target=".cityRequestFormModal">Submit a request</a> and we'll start working on bringing discounts to your local area.</p>
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

		<div class="col-12 col-md-11 pb-2 text-center more-coming">
			<h3 class="pb-3">More cities coming throughout {{ now()->year }}</h3>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cityRequestFormModal">Request a City</button>
		</div>

	</div>
</div>


@endsection

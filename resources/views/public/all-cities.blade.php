@extends('layouts.public')

@section('page-title')
All Cities
@endsection

@section('content')
<div class="container pb-4">
	<div class="row justify-content-center">

		<div class="col-12 col-md-11">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/"><i class="fas fa-home"></i></a></li>
					<li class="breadcrumb-item active">All Cities</li>
				</ol>
			</nav>
		</div>
		
		<div class="col-12 col-md-11 pt-4">
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
			<!-- <a href="#" class="btn btn-primary">Request a City</a> -->
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".cityRequestFormModal">Request a City</button>
		</div>

	</div>
</div>

			
@endsection
@extends('layouts.public')

@section('page-title')
All Cities
@endsection

@section('content')
<div class="container pb-4">
	<div class="row">

		<div class="col-12">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb">
					<li class="breadcrumb-item"><a href="/">Home</a></li>
					<li class="breadcrumb-item active">All Cities</li>
				</ol>
			</nav>
		</div>
		
		<div class="col-12 pt-4">
			<div class="row">
				
				@foreach($states as $state)
					<div id="stateBlock" class="col-6 col-sm-4 col-md-3 col-lg-2 mb-5">
						<h4 class="pl-1">{{ $state->name }}</h4>
						<hr class="hr-separator">

						<ul class="city-list">
							
							@foreach($state->cities as $city)
							<li>
								<div class="wrapper">
									<a class="city-link" href="{{ route('public.city', [ 'state' => $city->state->name, 'city' => $city->name ]) }}" class="text-decoration-none">

										<span class="name">{{ $city->name }}</span>

									</a>
									
								</div>
							</li>
							@endforeach

						</ul>
					</div>
				@endforeach

			</div>
		</div>

		<div class="col-12 pb-2 text-center more-coming">
			<h3 class="pb-3">More cities coming throughout 2020.</h3>
			<a href="#" class="btn btn-primary">Request a City</a>
		</div>

	</div>
</div>
@endsection
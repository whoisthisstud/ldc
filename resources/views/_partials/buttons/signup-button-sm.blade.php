@if( Auth::user() && Auth::user()->cities->first() )
	@if( Auth::user()->cities->count() >= 1 )
		@foreach( Auth::user()->cities as $subscribedTo )
			@if( $subscribedTo->id === $city->id )

				<div class="col-12 text-center">
				    <div class="d-block mb-5">
				        <button class="btn btn-sm btn-danger btn-badge" disabled>You are already subscribed to {{ $city->name }}, {{ $city->state->abbreviation }}</button>
				    </div>
				</div>

			@endif
		@endforeach
	@endif
	@if( Auth::user()->cities->count() > 0 && ( Auth::user()->cities->first()->id !== $city->id ) )
		<div class="col-12 text-center">
		    <div class="d-block mb-5">
		        <a href="#" class="btn btn-sm btn-primary">Add {{ $city->name }}, {{ $city->state->abbreviation }} to your account</a>
		    </div>
		</div>
	@endif
@else
	<div class="col-12 text-center">
	    <div class="d-block mb-5">
	        <a href="{{ route('public.signup', [ 'state' => $city->state->name, 'city' => $city->name ]) }}" class="btn btn-sm btn-primary">Request your Local Discount Club card for {{ $city->name }}, {{ $city->state->abbreviation }}</a>
	    </div>
	</div>
@endif
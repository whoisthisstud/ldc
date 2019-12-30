@if( Auth::user()->cities->first() )
	@if( Auth::user()->cities->count() >= 1 )
		@foreach( Auth::user()->cities as $subscribedTo )
			@if( $subscribedTo->id === $city->id )

				<div class="col-12 text-center">
				    <div class="d-block mb-5">
				        <button class="btn btn-lg btn-danger btn-badge" disabled>You are already subscribed to {{ $city->name }}, {{ $city->state->abbreviation }}</button>
				    </div>
				</div>

			@endif
		@endforeach
	@endif
	@if( Auth::user()->cities->count() === 1 && ( Auth::user()->cities->first()->id !== $city->id ) )
		<div class="col-12 text-center">
		    <div class="d-block mb-5">
		        <a href="#" class="btn btn-lg btn-primary">Add {{ $city->name }}, {{ $city->state->abbreviation }} to your Available Cities</a>
		    </div>
		</div>
	@endif
@else
	<div class="col-12 text-center">
	    <div class="d-block mb-5">
	        <a href="{{ route('public.signup', [ 'state' => $city->state->name, 'city' => $city->name ]) }}" class="btn btn-lg btn-primary">Register for your Local Discount Club in {{ $city->name }}, {{ $city->state->abbreviation }}</a>
	    </div>
	</div>
@endif
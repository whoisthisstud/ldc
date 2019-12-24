@extends('layouts.public')

@section('page-title', "Subscribe to the {{ config('app.name', 'Local Discount Club') }} for {{ $city->name }}, {{ $city->state->name }}")

@section('content')
	<div class="container signup-container">
		<div class="row justify-content-between">
			<div class="col-12 col-md-4 discount-card">
				<div class="discount-card-wrapper sticky-top pt-2">
					@include('_partials.icons.ldc_card_dark')
				</div>
			</div>
			<div class="col-12 col-md-7">
				<form action="" method="POST">
					<div class="card" style="min-height: 800px;">
						<div class="card-body">
							<input type="text">
						</div>
					</div>
				</form>
					
			</div>
		</div>
	</div>
@endsection
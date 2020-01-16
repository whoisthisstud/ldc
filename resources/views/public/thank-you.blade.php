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
				<h1>Thank you for signing up, {{ $user->name }}!</h1>
				<!-- <p class="lead">Check the inbox of {{ $user->email }} to confirm your email.</p> -->
				<p class="lead">We've sent a confirmation email to {{ $user->email }}. Check your inbox and verify your email to receive your Local Discount Club card.</p>
			</div>
		</div>
	</div>
@endsection

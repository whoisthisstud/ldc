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
				<form action="{{ route('signup.user', [ 'state' => $city->state->id, 'city' => $city->id ]) }}" method="POST">
					@csrf
					<div class="card shadow">
						<div class="card-body">
							<!-- <input type="hidden" value="{{ $city->id }}"> -->
							<div class="form-group row">
								<div class="col-12 col-md-6">
									<label for="name">First name</label>
						            <input type="text" class="form-control" id="name" name="name" placeholder="Your Full Name" value="" required>
						            <div class="invalid-feedback">
						              A valid name is required.
						            </div>
								</div>
								<div class="col-12 col-md-6">
									<label for="phone">Phone</label>
						            <input type="text" class="form-control" id="phone" name="phone" placeholder="Mobile Phone Number" value="" required>
						            <div class="invalid-feedback">
						              A valid mobile number is required.
						            </div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12">
									<label for="email">Email Address</label>
						            <input type="text" class="form-control" id="email" name="email" placeholder="Email Address" value="" required>
						            <div class="invalid-feedback">
						              A valid email is required.
						            </div>
								</div>
							</div>
							<div class="form-group row">
								<div class="col-12 col-md-6">
									<label for="password">{{ __('Password') }}</label>
		                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
		                            <div class="invalid-feedback">
		                                @error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
								</div>
								<div class="col-12 col-md-6">
									<label for="password-confirm">{{ __('Confirm Password') }}</label>
		                            <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
		                            <div class="invalid-feedback">
		                                @error('password')
		                                    <span class="invalid-feedback" role="alert">
		                                        <strong>{{ $message }}</strong>
		                                    </span>
		                                @enderror
		                            </div>
								</div>
							</div>

							<div class="form-group row">
								<div class="col-12">
									<div class="form-check pt-2">
										<input class="form-check-input" type="checkbox" required value="true" id="terms" name="terms">
										<label class="form-check-label" for="terms" style="font-size: .8rem;">
											I have read and accept the <a href="#">Terms of Use</a>.
										</label>
									</div>
								</div>
							</div>

						</div>
						<div class="card-footer">
							<div class="d-block text-right">
								<button type="cancel" class="btn btn-default">Cancel</button>
								<button type="submit" class="btn btn-primary btn-badge" onclick="ga('send', 'event', 'Signup', 'Registered', 'User Signup Form', '1');">Signup</button>
							</div>

						</div>
					</div>
				</form>

			</div>
		</div>
	</div>
@endsection

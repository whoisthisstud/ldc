@extends('layouts.public')

@section('page-title', "Subscribe to the {{ config('app.name', 'Local Discount Club') }} for {{ $city->name }}, {{ $city->state->name }}")

@section('content')
    <div id="pageHeader" class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12 text-center pt-5">
                <div class="page-header-bkgd" style="opacity:.85;">
                    @include('_partials.icons.dinner_primary')
                </div>
                <div class="select-city-icon-svg">
                    @include('_partials.icons.request-card_multi')
                    <span class="city-icon-text">Register for a card</span>
                </div>
                <h1 class="contact-header-text mb-2">Savings awaits you!</h1>
                <div class="signup-subtext">
                    In less time than it takes to make coffee, you can start saving at establishments near you.</strong>.
                </div>
                <div class="city-bkgd-ldc-card" style="opacity: .05;">
                    @include('_partials.icons.ldc_card_light_contact')
                </div>
            </div>
        </div>
    </div>
    <div id="pointsContainer" class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6">
                <div class="row row-cols-1 row-cols-sm-2">
                    <div class="col text-center">
                        <ul class="signup-values">
                            <li>Discounts at local establishments</li>
                            <li>Special promotions from participating businesses</li>
                        </ul>
                    </div>
                    <div class="col text-center">
                        <ul class="signup-values">
                            <li>Exclusive savings sent to you throughout the year</li>
                            <li>Awesome drawings and contests for real prizes</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container signup-container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-7">
                <form id="signupForm" action="{{ route('signup.user', [ 'state' => $city->state->id, 'city' => $city->id ]) }}" method="POST">
                    @csrf
                    <div class="card shadow">
                        <div class="card-body">
                            <!-- <input type="hidden" value="{{ $city->id }}"> -->
                            <div class="form-group row">
                                <div class="col-12 col-md-6">
                                    <label for="name">First name</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Full Name" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <label for="phone">Phone</label>
                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Mobile Phone Number" value="{{ old('phone') }}" required>
                                    @error('phone')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12">
                                    <label for="email">Email Address</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-12 col-md-6">
                                    <label for="password">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Password">
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
                                    <input id="password-confirm" type="password" class="form-control @error('password') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password" placeholder="Confirm Password">
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
    @if( $faqs->count() > 0 )
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
        <p class="easy-last-call pt-3 border-top d-inline-block mt-4">Still curious?  Check out our <a href="{{ route('public.faqs') }}">Frequently Asked Questions</a>.</p>
    </div>
    @endif
@endsection

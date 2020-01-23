@extends('layouts.public')

@section('page-title', "Subscribe to the {{ config('app.name', 'Local Discount Club') }} for {{ $city->name }}, {{ $city->state->name }}")

@section('content')
<div id="pageHeader" class="container-fluid pb-5">
    <div class="row justify-content-center pb-4">
        <div class="col-12 text-center pt-5">
            <!-- <div class="contact-header-bkgd"></div> -->
            <div class="page-header-bkgd" style="opacity:.85;">
                @include('_partials.icons.dinner_primary')
            </div>
            <div class="select-city-icon-svg">
                @include('_partials.icons.verify-email_multi')
                <span class="city-icon-text">Verify your email</span>
            </div>
            <h1 class="thank-you-header-text">Welcome to the club, {{ $user->name }}!</h1>
            <div class="thank-you-follow">
            	<p>We've sent a confirmation email to {{ $user->email }}.</p>
            	<p>Check your inbox and verify your email to receive your Local Discount Club card.</p>
            </div>

            <div class="contact-page-ldc-card" style="opacity: .05;">
                @include('_partials.icons.ldc_card_light_contact')
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.public')

@section('page-title', 'About Us')

@section('content')
<div id="pageHeader" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 text-center pt-5">
            <!-- <div class="contact-header-bkgd"></div> -->
            <div class="page-header-bkgd" style="opacity:.85;">
                @include('_partials.icons.dinner_primary')
            </div>
            <!-- <div class="select-city-icon-svg">
                @include('_partials.icons.ldc_card_front_color')
                <span class="city-icon-text">Select your city</span>
            </div> -->
            <h1 class="contact-header-text mb-4">About Us</h1>

            <div class="city-bkgd-ldc-card" style="opacity: .05;">
                @include('_partials.icons.ldc_card_light_contact')
            </div>
        </div>
    </div>
</div>
@endsection

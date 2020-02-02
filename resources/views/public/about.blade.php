@extends('layouts.public')

@section('page-title', 'About Us')

@section('content')
<div id="aboutHeader" class="container-fluid pb-5">
    <div class="row justify-content-center">
        <div class="col-12 text-center pt-4">
            <div class="contact-header-bkgd">
                @include('_partials.icons.dinner_primary')
            </div>
            <div class="about-us-icon-svg">
                @include('_partials.icons.ldc_card_front_color')
            </div>
            <h1 class="contact-header-text">A team on a mission</h1>
            <p class="about-intro">Local Discount Club is a diverse team of former restaurant and retail leaders, spread across our market areas and beyond, who've come together with the sole purpose of increasing traffic into local businesses through low-cost, strategic marketing opportunities.</p>
            <div class="cta-buttons">
                <a href="#mission" class="btn btn-primary px-4">Our Mission</a>
                <!-- <a href="#mission" class="btn btn-primary mr-2 px-4">Our Mission</a> -->
                <!-- <a href="#" class="btn btn-primary ml-2 px-4">Our Core Values</a> -->
            </div>
            <div class="about-page-ldc-card">
                @include('_partials.icons.ldc_card_light_contact')
            </div>
        </div>
    </div>
</div>

<section id="mission" class="">
    <div class="divider-top-container">
        @include('_partials.icons.divider1')
    </div>
    <div class="container pb-5">
        <div lcass="row justify-content-center">
            <div id="missionContent" class="col-12">
                <h4 id="missionHeader">Our Mission</h4>

                <!-- start: Mission Point #1 -->
                <div class="row justify-content-center">
                    <div class="col-12 col-md-4">
                        <div class="section-svg section-card-svg">
                            @include('_partials.icons.ldc_card_front_color')
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <p class="section-1 section-text">To provide the simplest, and most convenient, discount club program available.</p>
                        <p class="section-hash-tags">#simple #convenient #savings</p>
                    </div>
                </div>

                <!-- start: Mission Point #2 -->
                <div class="row row-2 justify-content-center">
                    <div class="col-12 col-sm-7 col-md-6">
                        <p class="section-2 section-text">To increase traffic to establishments in our market areas through strategic, local, savings-based marketing opportunities.</p>
                    </div>
                    <div class="col-12 col-sm-5 col-md-4">
                        <div class="section-svg">
                            @include('_partials.icons.traffic_multi')
                        </div>
                    </div>

                </div>

                <!-- start: Mission Point #3 -->
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-5 col-md-4">
                        <div class="section-svg">
                            @include('_partials.icons.repeat-business_multi')
                        </div>
                    </div>
                    <div class="col-12 col-sm-7 col-md-6">
                        <p class="section-3 section-text">To help residents in our market areas save money at frequented establishments with conveniently-accessible exclusive discount opportunities.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="divider-bottom-container">
        @include('_partials.icons.divider1')
    </div>
</section>

<section id="coreValues">
    <div class="container py-4">
        <div class="row my-4">
            <div class="col-12">
                <h4 id="valueHeader">Our Core Values</h4>
            </div>
        </div>
        <div class="row justify-content-center text-left pb-5">
            <div class="col-12 col-md-10">
                <div class="row row-cols-1 row-cols-md-3 justify-content-center pb-3"> 
                    <div class="col p-4">
                        <h5 class="value text-primary">Integrity, Honesty, & Consistency</h5>
                        <p class="core">Honesty and integrity in everything we do. <strong>Our word is our bond</strong>. Be consistent.</p>
                    </div>
                    <div class="col p-4">
                        <h5 class="value text-primary">A Service & Servant's Mentality</h5>
                        <p class="core">Be humble, compassionate and committed to the growth of our employees, clients, and customers.</p>
                    </div>
                    <div class="col p-4">
                        <h5 class="value text-primary">A Fun & Engaging Team</h5>
                        <p class="core">Have fun. Care sincerely. Build relationships. Be enjoyable to work with.</p>
                    </div>
                </div>
            </div>
        </div>                
    </div>
</section>

<section id="contactInfo" style="background-color: #e2ebf0 !important;">
    <div class="container pb-5">
        <div class="row justify-content-center pt-5">
            <div class="col-6 mt-5">
                <div class="contact-ldc-logo">
                    @include('_partials.icons.ldc_card_front_color')
                </div>
            </div>
            <div class="col-12 col-6 text-center pt-3">
                <div class="contact-ldc-name">
                    <h3>Local Discount Club</h3>
                    <address>
                        206 W. Armstrong
                        <br>
                        Prairie Grove, Arkansas 72753
                    </address>
                    <address>
                        <a href="mailto:grow@yourldc.com">grow@yourldc.com</a>
                    </address>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@extends('layouts.public')

@section('page-title', 'About Us')

@section('content')
<div id="contactHeader" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 text-center pt-5">
            <div class="contact-header-bkgd">
                @include('_partials.icons.dinner_primary')
            </div>
            <h1 class="contact-header-text">We’d love to hear from you!</h1>
            <p class="contact-intro">Whether you have a question not answered in our <a href="{{ route('public.faqs') }}">FAQ’s</a>, or simply wish to say hello, there are real humans on the other end of this form.</p>
            <div class="contact-page-ldc-card">
                @include('_partials.icons.ldc_card_light_contact')
            </div>
        </div>
    </div>
</div>

<div class="container pb-5">
    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-6">

            <div id="contactForm" class="card p-4 shadow-5">
                <div class="card-body">
                    <form id="contactForm" action="{{ route('submit.contact') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name" name="name" placeholder="Your Name" value="{{ old('name') }}">
                            @error('name')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" id="email" name="email" placeholder="you@youremailprovider.com" value="{{ old('email') }}">
                            @error('email')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control form-control-lg @error('message') is-invalid @enderror" id="message" name="message" rows="5" placeholder="Your message here...">{{ old('message') }}</textarea>
                            @error('message')
                                <div class="error">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="d-block text-center mt-5">
                            <button type="" class="btn btn-primary">Submit Contact</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>

    <div class="row justify-content-center pt-5">
        <div class="col-6 mt-5">
            <div class="contact-ldc-logo">
                @include('_partials.icons.ldc_card_dark')
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
                    <a href="mailto:contact@yourldc.com">contact@yourldc.com</a>
                </address>
            </div>
        </div>
    </div>

</div>
@endsection

@extends('layouts.public')

@section('page-title', 'About Us')

@section('content')
<div id="contactHeader" class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12 text-center pt-5">
            <div class="contact-header-bkgd"></div>
            <p class="contact-intro text-primary">Got a Question?</p>
            <h1 class="contact-header-text">Contact Us</h1>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-5">

            <div id="contactForm" class="card p-4 shadow-5">
                <div class="card-body">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Your Name">

                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="you@email.com">

                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Your message here..."></textarea>
                        </div>
                        <button type="" class="btn btn-primary">Submit Contact</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection

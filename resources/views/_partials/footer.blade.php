<footer class="text-muted bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-9">
                <a href="#" class="display-4 d-flex align-items-center text-light" style="font-size: 2rem;">
                    <div class="footer-logo-wrapper">
                        @include('_partials.icons.ldc_card_light')
                    </div>
                    <strong>{{ config('app.name', 'Local Discount Club') }}</strong>
                </a>
                <div class="row mt-4">
                    <div class="col-12 col-md-4">
                        <h5 class="text-muted">General</h5>
                        <ul class="pl-0" style="list-style: none;">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Link Here</a></li>
                            <li><a href="#">Link Here</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-4">
                        <h5 class="text-muted">More Info</h5>
                        <ul class="pl-0" style="list-style: none;">
                            <li><a href="#">View All Cities</a></li>
                            <li><a href="#">Request A City</a></li>
                            <li><a href="#">Link Here</a></li>
                            <li><a href="#">Link Here</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-md-4">
                        <h5 class="text-muted">Other Links</h5>
                        <ul class="pl-0" style="list-style: none;">
                            <li><a href="#">Link Here</a></li>
                            <li><a href="#">Link Here</a></li>
                            <li><a href="#">Link Here</a></li>
                            <li><a href="#">Link Here</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3">
                <div class="d-block bg-light py-5 px-1 text-center" style="min-height:180px;">
                    Maybe most recent tweet?
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <small>&copy;{{ now()->year }} {{ config('app_name', 'Local Discount Club') }}. All rights reserved.</small>
                <div class="float-right">
                    <a class="" href="{{ route('public.privacy') }}">Privacy Policy</a>
                </div>
            </div>
        </div>

    </div>
</footer>

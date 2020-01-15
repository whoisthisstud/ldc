<footer class="text-muted bg-dark">
    <div class="container">
        <!-- <div class="row">
            <div class="col-12 col-md-8">
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
                            <li><a href="#">Request A Business</a></li>
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
            <div class="col-12 col-md-4 mt-n5">
                <div class="d-block bg-light text-center" style="min-height:180px;">
                    <blockquote class="twitter-tweet"><p lang="en" dir="ltr">Because of the Lord’s great love we are not consumed, for his compassions never fail. They are new every morning; great is your faithfulness. I say to myself, “The Lord is my portion; therefore I will wait for him. Lamentations 3: 22-24</p>&mdash; God’s Motivations 📖 (@GodsMotivations) <a href="https://twitter.com/GodsMotivations/status/1211799376789532672?ref_src=twsrc%5Etfw">December 31, 2019</a></blockquote> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                </div>
            </div>
        </div> -->

        <div class="row">
            <div class="col-12">
                <small>&copy;{{ now()->year }} {{ config('app_name', 'Local Discount Club') }}. All rights reserved.</small>
                <div class="float-right" style="font-size:.75rem; line-height:1.5rem;">
                    <a class="pr-2 border-right mr-2" href="{{ route('public.privacy') }}">Privacy Policy</a>
                    <a class="" href="{{ route('public.terms') }}">Terms of Use</a>
                </div>
            </div>
        </div>

    </div>
</footer>

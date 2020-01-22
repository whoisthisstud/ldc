<footer class="text-muted bg-dark">
    <div class="container">
        <div class="row justify-content-center py-4">
            <div class="col-12 col-md-3">
                <a href="#" class="display-4 d-flex align-items-center text-light" style="font-size: 2rem;">
                    <div class="footer-logo-wrapper">
                        {{-- @include('_partials.icons.ldc_card_light') --}}
                        @include('_partials.icons.ldc_card_front_color')
                    </div>
                </a>
            </div>
            <div class="col-12 col-md-3 pt-2">
                <h4 class="footer-section-header">General</h4>
                <ul class="pl-0 footer-submenu" style="list-style: none;">
                    <li><a href="{{ route('public.about') }}">About Us</a></li>
                    <li><a href="{{ route('public.contact') }}">Contact Us</a></li>
                    <li><a href="{{ route('public.faqs') }}">Frequently Asked Questions</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 pt-2">
                <h4 class="footer-section-header">Recommend</h4>
                <ul class="pl-0 footer-submenu" style="list-style: none;">
                    <li><a href="#" data-toggle="modal" data-target=".cityRequestFormModal">Request a City</a></li>
                    <li><a href="#" data-toggle="modal" data-target=".businessRequestFormModal">Request a Business</a></li>
                    <li><a href="#" data-toggle="tooltip" data-placement="top" title="Coming Soon!">Add Your Business</a></li>
                </ul>
            </div>
            <div class="col-12 col-md-3 pt-2">
                <h4 class="footer-section-header">Get Social</h4>
                <ul class="pl-0 footer-submenu" style="list-style: none;">
                    <li><a href="//www.facebook.com/yourldc" target="_blank">Facebook</a></li>
                    <li><a href="//www.instagram.com/localdiscountclub/" target="_blank">Instagram</a></li>
                    <li><a href="//twitter.com/yourldc" target="_blank">Twitter</a></li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <small class="rights">&copy;{{ now()->year }} {{ config('app_name', 'Local Discount Club') }}. All rights reserved.</small>
                <div class="small-footer-links" style="">
                    <a class="pr-2 mr-1 text-decoration-none" href="{{ route('public.about') }}" style="border-right: 1px solid #4d555d !important;">About Us</a>
                    <a class="pr-2 mr-1 text-decoration-none" href="{{ route('public.contact') }}" style="border-right: 1px solid #4d555d !important;">Contact Us</a>
                    <a class="pr-2 mr-1 text-decoration-none" href="{{ route('public.privacy') }}" style="border-right: 1px solid #4d555d !important;">Privacy Policy</a>
                    <a class=" text-decoration-none" href="{{ route('public.terms') }}">Terms of Use</a>
                </div>
            </div>
        </div>

    </div>
</footer>

<!doctype html>
<html lang="en">
    <head>
        @include('_partials.scripts.gtm-head')

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- MINIFIED -->
        {!! SEO::generate() !!}

        @include('_partials.favicons')

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css" />

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- Favicons -->
        <meta name="theme-color" content="#563d7c">
    </head>

    <body>
        @include('_partials.scripts.gtm-body')

        @include('_partials.menus.public-menu')

        <main class="menu-padding hidden-footer" role="main">
            <div id="contactHeader" class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-12 text-center pt-5">
                        <div class="contact-header-bkgd">
                            @include('_partials.icons.dinner_primary')
                        </div>
                        <h1 class="error-header-text">@yield('code', __('Oh no'))</h1>
                        <p class="error-intro">@yield('message')</p>
                        <a href="{{ route('public.index') }}" class="btn btn-primary mt-4">
                                {{ __('Go Home') }}
                        </a>
                        <div class="error-bkgd-ldc-card">
                            @include('_partials.icons.ldc_card_light_contact')
                        </div>
                    </div>
                </div>
            </div>

        </main>

        @include('_partials.footer')

        @if( isset($select_states) )
            @include('_partials.modals.city-request-form-modal')
        @endif

        @if( isset($select_cities) )
            @include('_partials.modals.business-request-form-modal')
        @endif

        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

        @include('_partials.scripts.business-request-ajax-script')
        @include('_partials.scripts.city-request-ajax-script')

    </body>
</html>

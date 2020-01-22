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
        @notify_css
        @yield('styles')

        <!-- Custom styles for this template -->
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- Favicons -->
        <meta name="theme-color" content="#563d7c">
    </head>

    <body>
        @include('_partials.scripts.gtm-body')

        @include('_partials.menus.public-menu')

        <main class="menu-padding hidden-footer" role="main">
            {{-- Route::is('public.index') || --}}  

            @yield('content')

        </main>

        @include('_partials.footer')

        @if( isset($select_states) )
            @include('_partials.modals.city-request-form-modal')
        @endif

        @if( isset($select_cities) )
            @include('_partials.modals.business-request-form-modal')
        @endif

        @notify_js
        <script src="{{ asset('js/popper.js') }}"></script>
        <script src="{{ asset('js/bootstrap/bootstrap.bundle.min.js') }}"></script>

        @include('_partials.scripts.business-request-ajax-script')
        @include('_partials.scripts.city-request-ajax-script')

        @yield('scripts')
        @notify_render
        <script>
            var i = 0;
            $('.navbar-toggler').on('click', function() {
                $('body').toggleClass('nav-open');

                if( i == 1 ) {
                    $('.open-nav-cover').detach();
                }
                else {
                    $('body').append('<div class="open-nav-cover"></div>');
                }

                i = (i==0 || i=='') ? i=1 : i=0;
            });
            
            $(function () {
                $('[data-toggle="tooltip"]').tooltip()
            })
        </script>

    </body>
</html>

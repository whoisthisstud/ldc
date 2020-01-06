<!doctype html>
<html lang="en">
    <head>
        @include('_partials.scripts.gtm-head')

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <title>Local Discount Club | @yield('page-title')</title>

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

        <main class="{{ Route::is('public.index') || Route::is('public.city') ? '' : 'menu-padding' }} hidden-footer" role="main">

            @yield('content')

        </main>

        @include('_partials.footer')

        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

        <script src="{{ asset('js/app.js') }}"></script>

        @yield('scripts')
        @notify_js
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
        </script>
    </body>
</html>

<nav id="admin-header" class="navbar navbar-expand-md navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            @include('_partials.icons.logo2')
            <span class="pt-1"><strong>{{ config('app.name', 'Local Discount Club') }}</strong></span>

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('states.index') }}">States</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('businesses.index') }}">Businesses</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mr-4" href="{{ route('test') }}">Test</a>
                </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right user-menu" aria-labelledby="navbarDropdown">
                            <div class="row">
                                <div class="col-4">
                                    <div class="rounded-circle bg-primary profile-img">
                                        <span class="profile-letter">{{ substr(Auth::user()->name,0,1) }}</span>
                                    </div>                                  
                                </div>
                                <div class="col-8">
                                    <div class="profile-name">{{ Auth::user()->name }}</div>
                                    <div class="profile-email">{{ Auth::user()->email }}</div>
                                </div>
                                
                            </div>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

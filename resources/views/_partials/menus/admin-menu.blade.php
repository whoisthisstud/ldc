<nav id="admin-header" class="navbar navbar-expand-md navbar-dark shadow-sm sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ Auth() && Auth()->user() ? route('home') : '/' }}">
            @include('_partials.icons.ldc_card_light')
            <span class="d-inline-block" style="position: absolute;margin-top: .125rem;"><strong>{{ config('app.name', 'Local Discount Club') }}</strong></span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <!-- <ul class="navbar-nav mr-auto">

            </ul> -->

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto mt-1">
                <!-- Authentication Links -->
                @guest
                    <!-- <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li> -->
                    @if (Route::has('register'))
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li> -->
                    @endif
                @else
                    @can('manage-states')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('states.index') }}">States</a>
                    </li>
                    @endcan

                    @can('manage-businesses')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('businesses.index') }}">Businesses</a>
                    </li>
                    @endcan

                    @can('manage-discounts')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('discounts.index') }}">Discounts</a>
                    </li>
                    @endcan

                    @can('manage-faqs')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('faqs.index') }}">FAQs</a>
                    </li>
                    @endcan

                    @can('manage-users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                    </li>
                    @endcan

                    @can('access-testing')
                    <li class="nav-item">
                        <a class="nav-link mr-4 bg-inverse" href="{{ route('test') }}">Testing</a>
                    </li>
                    @endcan

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Welcome, {{ Auth::user()->name }} <span class="caret"></span>
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
                            <div class="user-links pt-3">
                                <a class="dropdown-item user-menu-link" href="{{ url('/') }}">
                                    <i class="fas fa-desktop mr-2"></i>
                                    View Public Website
                                </a>

                                @can('manage-messages')
                                <a class="dropdown-item user-menu-link" href="{{ route('messages.index') }}">
                                    <i class="fas fa-inbox mr-2"></i>
                                    Public Contact
                                </a>
                                @endcan

                                @can('access-testing')
                                <a class="dropdown-item user-menu-link" href="/telescope">
                                    <i class="fas fa-chart-line mr-2"></i>
                                    Reporting
                                </a>
                                <a class="dropdown-item user-menu-link" href="#">
                                    <i class="fas fa-clipboard-list mr-2"></i>
                                    Activity Logs
                                </a>
                                @endcan

                            </div>

                            <hr class="h-separator my-3">
                            <div class="option-menu px-1">
                                <div class="row">

                                    <div class="col-4">
                                        <a href="#" class="dropdown-item settings-btn">
                                            <i class="fas fa-cog"></i>
                                        </a>
                                    </div>

                                    <div class="col-8">
                                        <!-- Logout button -->
                                        <a class="dropdown-item logout-btn" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                         document.getElementById('logout-form').submit();">
                                            <i class="fas fa-power-off mr-1"></i>
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

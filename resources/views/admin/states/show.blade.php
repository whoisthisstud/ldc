@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">

            <section class="sub-header">
                <div class="container">

                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="pt-1">
                                <span class="d-inline-block align-middle mt-n2">
                                    <a href="{{ route('states.index') }}" class="text-decoration-none">
                                        States
                                    </a>
                                    &nbsp; &raquo; &nbsp;
                                </span>
                                <h5 class="d-inline-block">{{ $state->name }}</h5>
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="{{ route('cities.create', [ 'state' => $state->id ]) }}" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add City
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <ul class="submenu ml-md-auto pl-0 mb-0 text-md-right text-sm-center">
                                <li class="nav-item d-inline-block">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-secondary btn-badge dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-file-download mr-1"></i>
                                            Export
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="exportBtn">
                                            <a class="dropdown-item" href="#">XLS</a>
                                            <a class="dropdown-item" href="#">CSV</a>
                                            <a class="dropdown-item" href="#">PDF</a>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <section class="mt-5 mb-4">
                <div class="container">
                    <div class="row">

                        @foreach( $state->cities as $city )
                            <div class="col-md-4 col-sm-12 mb-3">
                                <div class="city-card-tile">
                                    <div class="city-card-wrapper">
                                        @if( $city->is_active == true )
                                            <span class="active-city-badge">ACTIVE</span>
                                        @endif

                                        <a href="{{ route('view.city', [ 'city' => $city->id ]) }}" class="text-decoration-none">
                                            <div class="city-card-header">
                                                <div class="text-center">
                                                    <h4 class="mt-2 mb-1">{{ $city->name }}, {{ $state->abbreviation }}</h4>
                                                    <h1 class="display-2">{{ $city->zip_code }}</h1>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="city-card-stats halfed">
                                            <div><strong><small>Discounts</small></strong> {{ $city->discounts->count() }}</div>
                                            <div><strong><small>Signups</small></strong> {{ $city->users->count() }}</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

        </div>
    </div>

</div>
@endsection

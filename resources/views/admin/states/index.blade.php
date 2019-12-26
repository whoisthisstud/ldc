@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">

            <section class="sub-header">
                <div class="container">

                    <div class="row">
                        <div class="col-6 d-flex">
                            <div class="pt-1">
                                <span class="d-inline-block align-text-middle mt-n2 pt-1">
                                    <a href="{{ route('home') }}" class="text-decoration-none">
                                        <i class="fas fa-home"></i>
                                    </a>
                                    &nbsp; &raquo; &nbsp;
                                </span>
                                <h5 class="d-inline-block">States</h5>
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="{{ route('states.create') }}" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add State
                                </a>
                            </div>
                        </div>

                        <div class="col-6">
                            <ul class="submenu ml-auto mb-0 text-right">
                                <li class="nav-item d-inline-block">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-secondary btn-badge  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                <li class="nav-item d-inline-block">
                                    <a class="btn btn-sm btn-primary btn-badge" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </section>
            <!-- <hr class="h-separator"> -->
        </div>
    </div>

    <div class="row">
        <div class="col-12">

            <section class="mt-5 mb-4">
                <div class="container">
                    <div class="row">

                        @foreach($states as $state)
                            <div class="col-md-4 col-sm-12 mb-3"><!-- col-lg-3  -->
                                <div class="city-card-tile">
                                    <div class="city-card-wrapper">

                                        <a href="{{ route('view.state', [ 'state' => $state->id ]) }}" class="text-decoration-none">
                                            <div class="city-card-header">
                                                <div class="text-center">
                                                    <h4 class="mt-2 mb-0">{{ $state->name }}</h4>
                                                    <h1 class="display-1">{{ $state->abbreviation }}</h1>
                                                </div>
                                            </div>
                                        </a>

                                        <div class="city-card-stats quad">
                                            <div>
                                                <strong><small>Cities</small></strong>
                                                {{ $state->cities->count() }}
                                            </div>
                                            <div><strong><small>Businesses</small></strong> 0</div>
                                            <div><strong><small>Discounts</small></strong> 0</div>
                                            <div><strong><small>Signups</small></strong> 0</div>
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

<!--     <div class="row mt-3">
        <div class="container">
            <div class="col-12">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item page-nav disabled"><a class="page-link" href="#" tabindex="-1" aria-disabled="true">&laquo;</a></li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item break"><span class="page-link">...</span></li>
                        <li class="page-item"><a class="page-link" href="#">7</a></li>
                        <li class="page-item"><a class="page-link" href="#">8</a></li>
                        <li class="page-item page-nav"><a class="page-link" href="#">&raquo;</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div> -->

</div>
@endsection

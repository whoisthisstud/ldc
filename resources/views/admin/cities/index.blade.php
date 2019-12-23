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
                                <span class="d-inline-block align-text-bottom mt-n2">
                                    <a href="{{ route('view.state', [ 'state' => $city->state->id ]) }}" class="text-decoration-none">
                                        <!-- <i class="fas fa-home"></i> -->
                                        {{ $city->state->name }}
                                    </a>
                                    &nbsp; &raquo; &nbsp;
                                </span>
                                <h5 class="d-inline-block">{{ $city->name }}</h5>               
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="{{ route('city.discount', [ 'city' => $city->id ]) }}" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add Discount
                                </a>
                            </div>  
                        </div>

                        <div class="col-12 col-md-6">
                            <ul class="submenu ml-auto mb-0 text-right">
                                <li class="nav-item d-inline-block">
                                    <a class="btn btn-sm btn-danger btn-badge" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete City
                                    </a>
                                </li>
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

                        
                        @foreach($city->discounts as $discount)
                            <div class="col-md-4 col-sm-12 mb-3">
                                <div class="city-card-tile">
                                    <div class="city-card-wrapper">

                                        <a href="#" class="text-decoration-none">
                                            <div class="city-card-header">
                                                <div class="text-center">
                                                    <h4 class="mt-2 mb-0">{{ $discount->code }}</h4>
                                                </div>
                                            </div>
                                        </a>                                       

                                        <div class="city-card-stats">
                                            <div>
                                                <strong><small>Subscribers</small></strong> 
                                                1,802
                                            </div>
                                            <div>
                                                <strong><small>Opens</small></strong> 
                                                10,386
                                            </div>
                                            <div>
                                                <strong><small>Open %</small></strong> 
                                                576%
                                            </div>
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
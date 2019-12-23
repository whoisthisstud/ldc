@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-12">
            
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif

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
                                <h5 class="d-inline-block">Businesses</h5>               
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="{{ route('businesses.create') }}" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add Business
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

                        @foreach($businesses as $business)
                            <div class="col-md-4 col-sm-12 mb-3 card-hover"><!-- col-lg-3  -->
                                <div class="business-card hover-card">
                                    <div class="card-top">
                                        <div class="city-card-tile">
                                            <div class="city-card-wrapper">
                                                <div class="city-card-menu">
                                                    <div class="">
                                                        <button type="button" class="btn btn-sm btn-default" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="fas fa-ellipsis-v"></i>
                                                        </button>
                                                       
                                                        <div class="dropdown-menu dropdown-menu-right p-2" aria-labelledby="exportBtn">
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-eye mr-1"></i>
                                                                View
                                                            </a>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="fas fa-edit mr-1"></i>
                                                                Edit
                                                            </a>
                                                            <div class="dropdown-divider"></div>
                                                            <a class="dropdown-item btn-delete" href="#">
                                                                <i class="fas fa-trash mr-1"></i>
                                                                Delete
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <a href="{{ route('view.business', [ 'business' => $business->id ]) }}" class="text-decoration-none">
                                                    @if( $business->logo != null )
                                                        <div class="py-2 px-4">
                                                            <div class="business-logo" style="background-image: url({{ asset( $business->logo ) }});"></div>
                                                        </div>
                                                    @else
                                                        <div class="city-card-header">
                                                            <div class="text-center">
                                                                <h4 class="mt-2 mb-0">{{ $business->name }}</h4>
                                                            </div>
                                                        </div>
                                                    @endif
                                                </a>                                       

                                                <div class="city-card-stats halfed">
                                                    <div><strong><small>Cities</small></strong> 0</div>
                                                    <div><strong><small>Discounts</small></strong> 0</div>
                                                </div>

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

    <div class="row mt-3">
        <div class="container">
            <div class="col-12">
                {{ $businesses->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
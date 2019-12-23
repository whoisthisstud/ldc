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
                        <div class="col-12 col-md-8 d-flex">
                            <div class="pt-1">
                                <span class="d-inline-block align-text-middle mt-n2 pt-1">
                                    <a href="{{ route('businesses.index') }}" class="text-decoration-none">
                                        <!-- <i class="fas fa-home"></i> -->
                                        Businesses
                                    </a>
                                    &nbsp; &raquo; &nbsp;
                                </span>
                                <h5 class="d-inline-block">{{ $business->name }}</h5>               
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="{{ route('business.discount', [ 'business' => $business->id ]) }}" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add Discount
                                </a>
                            </div>  
                        </div>

                        <div class="col-12 col-md-4">
                            <ul class="submenu ml-auto mb-0 text-right">
                                <li class="nav-item d-inline-block">
                                    <a class="btn btn-sm btn-danger btn-badge" href="#" tabindex="-1" aria-disabled="true">
                                        <i class="fas fa-trash mr-1"></i>
                                        Delete Business
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

    <div class="row mt-5">
        <div class="col-4">
            <div class="business-details sticky-top">

                <div class="logo-block">                
                    @if($business->logo !== null)
                        <img src="{{ $business->logo }}" />
                    @else
                        <h1 class="display-1">{{ substr($business->name,0,1) }}</h1>
                    @endif
                </div>

                <div class="detail-info">
                    <p class="h4 business-name">{{ $business->name }}</p>
                    <p class="business-start">Member since: {{ $business->created_at->format('F jS, Y') }}</p>
                </div>
                
            </div>
        </div>

        <div class="col-8">

            
            <section class="mb-4">
                <div class="container">
                    <!-- Content Here -->
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <div class="card discounts-callout">
                                <div class="card-body">
                                    <p class="display-3 mb-n2">
                                        <span class="discount-count">{{ $business->discounts->count() }}</span>
                                        <span class="count-title h4">Discounts</span>
                                    </p>
                                    <p class="sub-text"><small>Current active discounts</small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-7">
                            <div class="card success-callout">
                                <div class="card-body">
                                    <p class="display-3 mb-n2">
                                        <span class="discount-count">23.6%</span>
                                        <span class="count-title h4">Success</span>
                                    </p>
                                    <p class="sub-text"><small>Success Rate based on 426 opens from 1,802 Subscribers</small></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <hr class="h-separator"> -->

                    <div class="row mt-5">
                        <div class="col-12">
                            <h4 class="mb-3">Active Discounts</h4>
                        </div>

                        @foreach($business->discounts as $discount)
                        <div class="col-md-6 col-sm-12 mb-3">
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
                                            426
                                        </div>
                                        <div>
                                            <strong><small>Open %</small></strong> 
                                            23.6%
                                        </div>
                                    </div>

                                </div>
                            </div> 
                        </div>
                        @endforeach

                        @for($i=0;$i<12;$i++)
                        <div class="col-md-6 col-sm-12 mb-3">
                            <div class="city-card-tile">
                                <div class="city-card-wrapper">

                                    <a href="#" class="text-decoration-none">
                                        <div class="city-card-header">
                                            <div class="text-center">
                                                <h4 class="mt-2 mb-0">Discount Code Example</h4>
                                            </div>
                                        </div>
                                    </a>                                       

                                    <div class="city-card-stats">
                                        <div>
                                            <strong><small>Subscribers</small></strong> 
                                            {{ rand(0,1500) }}
                                        </div>
                                        <div>
                                            <strong><small>Opens</small></strong> 
                                            {{ rand(0,900) }}
                                        </div>
                                        <div>
                                            <strong><small>Open %</small></strong> 
                                            {{ rand(0,500) }}.{{ rand(0,99) }}%
                                        </div>
                                    </div>

                                </div>
                            </div> 
                        </div>
                        @endfor

                    </div>
                </div>
            </section>          

        </div>
    </div>

</div>
@endsection
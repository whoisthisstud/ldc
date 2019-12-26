@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row mt-5">
        <div class="col-12">

            <section class="mb-4">
                <div class="container">
                    <!-- Content Here -->
                    <div class="row">
                        <div class="col-12 col-md-5">
                            <h1>Manager Dashboard</h1>
                            <div class="card discounts-callout">
                                <div class="card-body">
                                    <p class="display-3 mb-n2">
                                        <span class="discount-count">9</span>
                                        <span class="count-title h4">Businesses</span>
                                    </p>
                                    <p class="sub-text"><small>Current active businesses</small></p>
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
                </div>
            </section>

        </div>
    </div>

</div>
@endsection

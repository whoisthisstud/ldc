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
                                <span class="d-inline-block align-text-middle mt-n2 pt-1">
                                    <a href="{{ route('home') }}" class="text-decoration-none">
                                        <i class="fas fa-home"></i>
                                    </a>
                                    &nbsp; &raquo; &nbsp;
                                </span>
                                <h5 class="d-inline-block">Discounts</h5>   
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="#" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add Discount
                                </a>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
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
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary btn-badge dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="action-menu">
                                            <a class="dropdown-item disabled" href="#">
                                                <i class="fas fa-theater-masks mr-1"></i>
                                                Feature City
                                            </a>
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

    <div class="row mt-5">
        <div class="col-6">
        	<div class="card" style="background-color: #e3e7ee !important;">
        		<div class="card-body p-0 pt-3">
        			<div id="discountViews"></div>
        		</div>
        	</div>
        </div>
        <div class="col-6">
            <div class="card bg-primary" style="/* background-color: #2968a3 !important; */">
                <div class="card-body p-0 pt-3">
                    <div id="discountViews2"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-12">
            <h5 class="pt-2 pb-2">Top Five Viewed Discounts</h5>
            <table class="table table-sm table-striped table-hover" style="width:100%;">
                <thead style="background-color: #5d7b98 !important; color: #e3e7ee;">
                    <tr>
                        <th class="pl-3">Business</th>
                        <th>Discount</th>
                        <th>City</th>
                        <th class="text-right pr-3">Views</th>
                    </tr>
                </thead>
                <tbody class="">
                    @forelse($top_five as $top)
                    <tr>
                        <td class="pl-3">{{ $top->business->name }}</td>
                        <td>{{ $top->discount->title }}</td>
                        <td>{{ $top->city->name }}, {{ $top->city->state->abbreviation }}</td>
                        <td class="text-right pr-3">{{ $top->views }}</td>
                    </tr>
                    @empty
                        <th>n/a</th>
                        <th>n/a</th>
                        <th>n/a</th>
                        <th>n/a</th>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>

@endsection

@php
	$total = 0;
	foreach($date_list as $day){
		$total += $day['views'];
	}
    $active_total = 0;
    foreach($active_list as $discount){
        $active_total += $discount['amt'];
    }
@endphp

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
	var options = {
        series: [{
        	name: 'Views',
        	data: [
	    		@foreach( $active_list as $discounts )
	        		{ x:"{{ date($discounts['date']) }}",y:{{ $discounts['amt'] }} },
	        	@endforeach
	    	]
        }],
        chart: {
        	type: 'area',
        	height: 160,
        	sparkline: {
            	enabled: true
          	},
       	},
        stroke: {
        	curve: 'straight'
        },
        fill: {
        	opacity: 0.3
        },
        xaxis: {
        	crosshairs: {
            	width: 1
        	},
        },
        yaxis: {
        	min: 0
        },
        title: {
        	text: '{{ $active_total }}',
        	offsetX: 20,
        	style: {
        		fontSize: '56px',
        		color: '#3490dc',
        	}
        },
        subtitle: {
        	text: 'Active Discounts Created (last 30 days)',
        	offsetX: 20,
            offsetY: 62,
            style: {
                fontSize: '12px',
                fontStyle: 'italic',
                opacity: [0.4, 1],
            }
        }
    };

	var chart = new ApexCharts(document.querySelector("#discountViews"), options);
	chart.render();
</script>
<script>
    var options2 = {
        series: [{
            name: 'Views',
            data: [
                @foreach( $date_list as $day )
                    { x:"{{ date($day['date']) }}",y:{{ $day['views'] }} },
                @endforeach
            ]
        }],
        chart: {
            type: 'area',
            height: 160,
            sparkline: {
                enabled: true
            },
        },
        stroke: {
          curve: 'smooth',
          colors: ['#eff1f3'],
        },
        fill: {
          type:'solid',
          colors: ['#eff1f3'],
          opacity: [0.4, 1],
        },
        xaxis: {
            crosshairs: {
                width: 1
            },
        },
        yaxis: {
            min: 0
        },
        title: {
            text: '{{ $total }}',
            offsetX: 20,
            style: {
                fontSize: '56px',
                color: '#eff1f3',
            }
        },
        subtitle: {
            text: 'Discount Views (last 30 days)',
            offsetX: 20,
            offsetY: 62,
            style: {
                fontSize: '12px',
                color: 'rgba(239, 241, 243, 0.6)',
                fontStyle: 'italic',
                opacity: [0.4, 1],
            }
        }
    };

    var chart = new ApexCharts(document.querySelector("#discountViews2"), options2);
    chart.render();
</script>
@endsection
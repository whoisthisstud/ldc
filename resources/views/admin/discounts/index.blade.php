@extends('layouts.app')

@section('styles')
    @include('_partials.inline.datatables-inline-styles')
@endsection

@section('content')
<div class="container">

	<div class="row">
        <div class="col-12">

            <section class="sub-header">
                <div class="container">

                    <div class="row">
                        <div class="col-12 col-md-5 d-flex">
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

                        <div class="col-12 col-md-7">
                            <ul class="submenu ml-auto mb-0 text-right">
                                <li class="nav-item d-inline-block">
                                    <a id="toPrint" class="btn btn-sm btn-primary btn-badge">
                                        <i class="fas fa-print"></i>
                                    </a>
                                </li>
                                <li class="nav-item d-inline-block">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-secondary btn-badge  dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-file-download mr-1"></i>
                                            Export
                                        </button>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="exportBtn">
                                            <a id="toExcel" class="dropdown-item" >XLS</a>
                                            <a id="toCSV" class="dropdown-item" >CSV</a>
                                            <a id="toPDF" class="dropdown-item" >PDF</a>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item d-inline-block">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary btn-badge dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-columns mr-1"></i>
                                            Columns
                                        </button>

                                        <div id="columnBtn" class="dropdown-menu dropdown-menu-right" aria-labelledby="columnBtn">
                                            <a class="dropdown-item" title="Business" href="#" data-column="1">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                Business
                                            </a>
                                            <a class="dropdown-item" title="City" href="#" data-column="2">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                City
                                            </a>
                                            <a class="dropdown-item" title="Discount" href="#" data-column="3">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                Discount
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

    <div class="row row-cols-1 row-cols-md-3 mt-5">
        <div class="col">
        	<div class="card shadow-5-on-hover mb-3" style="background-color: #e3e7ee !important;">
        		<div class="card-body p-0 pt-3">
        			<div id="discountViews"></div>
        		</div>
        	</div>
        </div>
        <div class="col">
            <div class="card bg-primary shadow-5-on-hover mb-3" style="/* background-color: #2968a3 !important; */">
                <div class="card-body p-0 pt-3">
                    <div id="discountViews2"></div>
                </div>
            </div>
        </div>
        <div class="col">
            <!-- <h5 class="pt-2 pb-2">Top Five Viewed Discounts</h5> -->
            <table id="topFiveTable" class="table table-sm table-striped table-hover shadow-5-on-hover mb-3" style="width:100%;">
                <thead class="rounded-top" style="background-color: #3490dc !important; color: #e3e7ee;">
                    <tr>
                        <th class="pl-2" style="border-top-left-radius: 5px;">Top 5 <small><em>(by views)</em></small></th>
                        <th>City</th>
                        <th class="text-right pr-2" style="border-top-right-radius: 5px;">Views</th>
                    </tr>
                </thead>
                <tbody class="" style="font-size: 0.75rem;">
                    @forelse($top_five as $top)
                    <tr>
                        <td class="pl-2">{!! Str::limit($top->business->name, $limit = 20, $end = '...') !!}</td>
                        <td>{{ $top->city->name }}, {{ $top->city->state->abbreviation }}</td>
                        <td class="text-right pr-2">{{ $top->views }}</td>
                    </tr>
                    @empty
                        <td>n/a</td>
                        <td>n/a</td>
                        <td class="text-right">n/a</td>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
<!--     <div class="row mt-5">
        
    </div> -->
    
    <!-- <section class="mt-5 mb-4">
        <div class="container"> -->
            <div class="row mt-5 mb-4">
                <div class="col-12">

                    @if( $discounts->count() > 0 )
                    <div class="">
                        <table id="messagesTable" class="shadow-5 display table table-striped table-hover" data-page-length="10" data-order="[[ 4, &quot;desc&quot; ]]" style="width:100%;">
                            <thead class="thead-dark">
                                <tr>
                                    <th></th>
                                    <th>Business</th>
                                    <th>City</th>
                                    <th>Discount</th>
                                    <th>Begins On</th>
                                    <th>Expires On</th>
                                    <th class="text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($discounts as $discount)
                                <tr data-child-message="{{ $discount->description }}" class="">
                                    <td class="details-control"></td>
                                    <td>{{ $discount->business->name }}</td>
                                    <td>{{ $discount->city->name }}, {{ $discount->city->state->abbreviation }}</td>
                                    <td>{{ $discount->title }}</td>
                                    <td>{{ $discount->begins_at != null ? date('m/d/y',strtotime($discount->begins_at)) : 'Pending' }}</td>
                                    <td>{{ $discount->expires_at != null ? date('m/d/y',strtotime($discount->expires_at)) : 'Pending' }}</td>
                                    <td class="text-right">
                                        <a class="btn btn-sm btn-primary btn-badge" data-toggle="tooltip" data-placement="top" title="Edit Discount"><i class="fas fa-edit"></i></a>
                                        <a class="btn btn-sm btn-danger btn-badge" data-toggle="tooltip" data-placement="top" title="Delete Discount"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                    @else
                        <h3>No discounts have been created.</h3>
                    @endif

                </div>
            </div>
<!--         </div>
    </section> -->

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
<script type="text/javascript" src="{{ asset('/vendors/DataTables/datatables.min.js') }}"></script>
<script>
    var table;

    function format (message) {
        return '<div class="slider"><div class="sub-row">' + message + '</div><div class="sub-row"></div></div>';
    }

    $(document).ready(function() {
        table = $('#messagesTable').DataTable({
            // 'responsive': true,
            "dom": 'lBfrtip',
            language: { search: "" },
            buttons: [
                {
                    extend: 'csv',
                    className: 'd-none'
                }, {
                    extend: 'excel',
                    className: 'd-none'
                }, {
                    extend: 'pdf',
                    className: 'd-none'
                }, {
                    extend: 'print',
                    className: 'd-none'
                }
            ],
            "ordering": false
        });


        $("#toExcel").on("click", function() {
            table.button( '.buttons-excel' ).trigger();
        });

        $("#toCSV").on("click", function() {
            table.button( '.buttons-csv' ).trigger();
        });

        $("#toPDF").on("click", function() {
            table.button( '.buttons-pdf' ).trigger();
        });

        $("#toPrint").on("click", function() {
            table.button( '.buttons-print' ).trigger();
        });

        $('#messagesTable').on('click', 'td.details-control', function () {
            var tr = $(this).closest('tr');
            var row = table.row(tr);

            if ( row.child.isShown() ) {
                // This row is already open - close it
                $('div.slider', row.child()).slideUp( function () {
                    tr.removeClass('shown');
                    row.child.hide();
                });
            }
            else {
                // Open this row
                row.child(format( tr.data('child-message') )).show();
                $('div.slider', row.child(), 'no-padding').slideDown();
                tr.addClass('shown');
            }
        });
    });

    function setColVisible(columnIndex){
        if( table.column( columnIndex ).visible() ) {
            table.column( columnIndex ).visible(false);
        } else {
            table.column( columnIndex ).visible(true);
        }
    }

    $('#columnBtn a').on('click', function() {
        var thisColumn = $(this).data('column');
        setColVisible(thisColumn);
        $(this).children('i').toggleClass('d-none');
    });
</script>
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
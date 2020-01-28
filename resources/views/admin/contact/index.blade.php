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
                        <div class="col-12 col-md-6 d-flex">
                            <div class="pt-1">
                                <span class="d-inline-block align-text-middle mt-n2 pt-1">
                                    <a href="{{ route('home') }}" class="text-decoration-none">
                                        <i class="fas fa-home"></i>
                                    </a>
                                    &nbsp; &raquo; &nbsp;
                                </span>
                                <h5 class="d-inline-block">Contact Messages</h5>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <ul class="submenu ml-auto mb-0 text-right">
                                <a id="toPrint" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-print"></i>
                                </a>
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
                                <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-sm btn-primary btn-badge dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-columns mr-1"></i>
                                            Columns
                                        </button>

                                        <div id="columnBtn" class="dropdown-menu dropdown-menu-right" aria-labelledby="columnBtn">
                                            <a class="dropdown-item" title="Name" href="#" data-column="1">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                Name
                                            </a>
                                            <a class="dropdown-item"  title="Email" href="#" data-column="2">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                Email
                                            </a>
                                            <a class="dropdown-item"  title="IP Address" href="#" data-column="3">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                IP Address
                                            </a>
                                            <a class="dropdown-item"  title="Date" href="#" data-column="4">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                Date
                                            </a>
                                            <a class="dropdown-item"  title="Contacted?" href="#" data-column="5">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                Contacted?
                                            </a>
                                            <a class="dropdown-item"  title="Resolved?" href="#" data-column="6">
                                                <i class="fas fa-check mr-2 text-success"></i>
                                                <i class="fas fa-times mr-2 text-danger d-none"></i>
                                                Resolved?
                                            </a>
                                        </div>
                                    </div>
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
                        <div class="col-12">

                            @if( $contacts->count() > 0 )
                            <div class="container-fluid">
                                <table id="messagesTable" class="shadow-5 display table table-striped table-hover" data-page-length="10" data-order="[[ 4, &quot;desc&quot; ]]" style="width:100%;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>IP Address</th>
                                            <th>Message Date</th>
                                            <th>Contacted?</th>
                                            <th>Resolved?</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($contacts as $contact)
                                        <tr data-child-message="{{ $contact->message }}">
                                            <td class="details-control"></td>
                                            <td>{!! $contact->user_id != null ? '<a href="' . route('view.profile', ['user' => $contact->user_id]) . '">' : '' !!}{{ $contact->name }}{!! $contact->user_id != null ? '</a>' : '' !!}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td>{{ $contact->ip_address }}</td>
                                            <td>{{ $contact->created_at->format('m/d/y \@ h:i A') }}</td>
                                            <td>{{ $contact->has_contacted == true ? 'Yes' : 'No' }}</td>
                                            <td>{{ $contact->is_resolved == true ? 'Yes' : 'No' }}</td>
                                            <td class="text-right">
                                                <a class="btn btn-sm btn-primary btn-badge" data-toggle="tooltip" data-placement="top" title="Mark Contacted"><i class="fas fa-headset"></i></a>
                                                <a class="btn btn-sm btn-success btn-badge" data-toggle="tooltip" data-placement="top" title="Mark Resolved"><i class="fas fa-check"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @else
                                <h3>No messages have been submitted publicly.</h3>
                            @endif

                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

</div>
@endsection

@section('scripts')
<script type="text/javascript" src="{{ asset('/vendors/DataTables/datatables.min.js') }}"></script>
<script>
    var table;

    function format (message) {
        return '<div class="slider"><div class="sub-row">Message: ' + message + '</div><button class="btn btn-primary reply-btn">Reply (eventually)</button></div>';
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
@endsection

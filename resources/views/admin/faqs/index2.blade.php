@extends('layouts.app')

@section('styles')
<link rel="stylesheet" type="text/css" href="{{ asset('/vendors/DataTables/datatables.min.css') }}"/>
<style>
#messagesTable {
    border-radius: 5px;
}
#messagesTable_length,
#messagesTable_info,
#messagesTable_paginate {
    display: inline-block;
}
#messagesTable_filter,
#messagesTable_paginate {
    float: right;
}
#messagesTable_length label,
#messagesTable_filter label {
    opacity: 1;
    font-size: 80%;
    font-weight: 500;
}
#messagesTable_filter input {
    margin-left: 0.5rem;
    display: inline-block;
    width: 300px;
    border-radius: 20px;
    background-color: rgba(0, 0, 0, 0.05);
    padding: 0 .5rem 0 2.125rem;
}
#messagesTable_filter .form-control{
    background-image: url({{ asset('/i/search.svg') }});
    background-repeat: no-repeat;
    background-position: 9px 4px !important;
    background-size: 17px 25px;
}
#messagesTable_filter input:focus {
    background-color: #ffffff;
}
#messagesTable_length select {
    margin: 0 .25rem;
}
#messagesTable {
    margin-bottom: 1.5rem !important;
}
table.dataTable tbody td.no-padding {
    padding: 0;
}
.table .thead-dark th {
    color: #ffffff;
    background-color: #708fa9;
    border-color: #708fa9;
}
.table .thead-dark th:first-of-type {
    border-top-left-radius: 5px;
}
.table .thead-dark th:last-of-type {
    border-top-right-radius: 5px;
}

td.details-control::before {
    display: inline-block;
    font-style: normal;
    font-variant: normal;
    text-rendering: auto;
    -webkit-font-smoothing: antialiased;
    content: '\f063';
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    transform: rotate(0deg);
    transition: transform .15s linear;
}
td.details-control {
    cursor: pointer;
    text-align: right;
}
tr.shown td.details-control::before {
    /*content: '\f062';*/
    transform: rotate(-180deg);
    transition: transform .35s linear;
}
.slider {
    display:none;
}
.sub-row {
    padding: .5rem 3.5rem 1.5rem;
    font-size: 1rem;
    font-weight: 500;
}
button.reply-btn {
    margin: 0 3.5rem 1.5rem;
}
tr.inactive {
    background-color: #c9cbcf;
    color: #a0a5ab;
}
</style>
@endsection

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
                                <h5 class="d-inline-block">Frequently Asked Questions</h5>
                            </div>
                            <span class="v-separator"></span>
                            <div class="flex-fill">
                                <a href="{{ route('faqs.create') }}" class="btn btn-sm btn-primary btn-badge">
                                    <i class="fas fa-plus mr-1"></i> Add FAQ
                                </a>
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
                                            Question
                                        </a>
                                        <a class="dropdown-item"  title="Email" href="#" data-column="2">
                                            <i class="fas fa-check mr-2 text-success"></i>
                                            <i class="fas fa-times mr-2 text-danger d-none"></i>
                                            Type
                                        </a>
                                        <a class="dropdown-item"  title="IP Address" href="#" data-column="3">
                                            <i class="fas fa-check mr-2 text-success"></i>
                                            <i class="fas fa-times mr-2 text-danger d-none"></i>
                                            Active
                                        </a>
                                        <a class="dropdown-item"  title="Date" href="#" data-column="4">
                                            <i class="fas fa-check mr-2 text-success"></i>
                                            <i class="fas fa-times mr-2 text-danger d-none"></i>
                                            Actions
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

                            @if( $faqs->count() > 0 )
                            <div class="container-fluid">
                                <table id="messagesTable" class="shadow-5 display table table-striped table-hover" data-page-length="10" data-order="[[ 4, &quot;desc&quot; ]]" style="width:100%;">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th></th>
                                            <th>Question</th>
                                            <th>Type</th>
                                            <th>Active</th>
                                            <th class="text-right">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach($faqs as $faq)
                                        <tr data-child-message="{{ $faq->answer }}" class="{{ $faq->is_active == true ? '' : 'inactive' }}">
                                            <td class="details-control"></td>
                                            <td>{{ $faq->question }}{{ substr($faq->question,-1) !== '?' ? '?' : '' }}</td>
                                            <td>{{ $faq->type }}</td>
                                            <td>{{ $faq->is_active == true ? 'Active' : 'Inactive' }}</td>
                                            <td class="text-right">
                                                <a href="{{ route('faqs.edit',[$faq]) }}" class="btn btn-sm btn-primary btn-badge" data-toggle="tooltip" data-placement="top" title="Edit FAQ"><i class="fas fa-edit"></i></a>
                                                <a href="" class="btn btn-sm btn-danger btn-badge" data-toggle="tooltip" data-placement="top" title="Delete FAQ"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            @else
                                <h3>No FAQS have been created.</h3>
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
        return '<div class="slider"><div class="sub-row">' + message + '</div></div>';
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
        // $('#messagesTable').addClass('shadow-5');
    });

    function setColVisible(columnIndex){
        // table.column( columnIndex ).visible(false);
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


    // setColVisible(1);return false;

</script>
@endsection

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
                                                <a class="btn btn-sm btn-danger btn-badge" data-toggle="tooltip" data-placement="top" title="Delete FAQ"><i class="fas fa-trash"></i></a>
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

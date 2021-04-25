@extends('layouts.backend')

@section('title', 'List of Sales')

@section('content_header', 'List of Sales')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('sales.partial.addButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <table id="list-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Invoice Number</th>
                                <th>Invoice Date</th>
                                <th>Served By</th>
                                <th>Billed By</th>

                                @if( $templateUser->is_system_user 
                                || in_array('change_sales', $templatePermissions))
                                    <th>Action</th>
                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($sales))
                                @foreach($sales as $sale)
                                    <tr>
                                        <td>{{ $sale->invoice_number }}</td>
                                        <td>{{ $sale->created_at }}</td>
                                        <td>{{ $sale->served_by }}</td>
                                        <td>{{ $sale->billed_by }}</td>
                                        @if( $templateUser->is_system_user ||  in_array('change_sales', $templatePermissions))

                                            <td>

                                                @if( $templateUser->is_system_user || in_array('change_sales', $templatePermissions) )
                                                <a href="{{url('/sales/generate-invoice/'. $sale->id )}}"
                                                       class="btn btn-xs btn-primary mb-2">
                                                        <i class="menu-icon fa fa-eye"></i> View
                                                    </a>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('/assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>

    <script type="text/javascript">
        jQuery(function ($) {

            let table = $('#list-table').DataTable({
                "responsive": true,
                "pageLength": 50
            });

            // Sort by datatable desc
            table.order([2, 'asc'])
                .draw();

        })
    </script>
@endsection

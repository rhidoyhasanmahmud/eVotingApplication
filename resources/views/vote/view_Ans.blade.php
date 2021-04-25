@extends('layouts.backend')

@section('title', 'List of Question')

@section('content_header', 'List of Question')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
               
                <div class="widget-body">
                    <div class="widget-main">
                        <p class=" btn btn-xs btn-primary ace-icon fa fa-plus-circle bigger-130">Are you happy with current education system in kenya?</p>
                        <table id="list-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Opinion</th>
                            </tr>
                            </thead>
                                <tr>
                                    <td>Hasan Mahmud</td>
                                    <td>hasan.mahmud@gmail.com</td>
                                    <td> No </td>
                                </tr>

                            <tbody>
                           
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

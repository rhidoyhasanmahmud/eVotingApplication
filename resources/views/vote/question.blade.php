@extends('layouts.backend')

@section('title', 'List of Question')

@section('content_header', 'List of Question')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
               
                <div class="widget-body">
                    <div class="widget-main">

                        <table id="list-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Votes</th>
                                <th>Opition</th>
                            </tr>
                            </thead>
                                <tr>
                                    <td>Are you happy with current education system in kenya?</td>
                                     <td><a href="{{url('/vote')}}"
                                                       class="btn btn-xs btn-primary mb-2">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i> vote
                                                    </a>
                                                </td>
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

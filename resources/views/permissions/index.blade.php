@extends('layouts.backend')

@section('title', 'List of Permissions')

@section('content_header', 'List of Permissions')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('permissions.partial.addButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <table id="list-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code Name</th>
                                <th>Module Name</th>

                                @if( $templateUser->is_system_user || in_array('change_permissions', $templatePermissions) || in_array('delete_permissions', $templatePermissions) )

                                    <th>Action</th>

                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($permissions))
                                @foreach($permissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->codename }}</td>
                                        <td>{{ $permission->module->label }}</td>

                                        @if( $templateUser->is_system_user || in_array('change_permissions', $templatePermissions) || in_array('delete_permissions', $templatePermissions))

                                            <td>
                                                @if( $templateUser->is_system_user || in_array('change_permissions', $templatePermissions) )
                                                    <a href="{{url('/permissions/'. $permission->id . '/edit')}}"
                                                       class="btn btn-xs btn-primary mb-2">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i> Edit
                                                    </a>
                                                @endif

                                                @if( $templateUser->is_system_user || in_array('change_permissions', $templatePermissions) )
                                                    <form action="{{url('/permissions', ['id'=>$permission->id])}}" method="POST"
                                                          onsubmit="return confirm('Are you sure?')"
                                                          style="display: inline-block;">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button class="btn btn-danger btn-xs">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i> Delete
                                                        </button>
                                                    </form>
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

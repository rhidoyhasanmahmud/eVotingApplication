@extends('layouts.backend')

@section('title', 'List of Voters')

@section('content_header', 'List of Voters')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('users.partial.addButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">

                        <table id="list-table" class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Full Name</th>
                                <th>Email</th>
                                <th>Country</th>
                                <th>Province</th>
                                <th>Constituency</th>
                                <th>Sub County</th>
                                <th>Created Datetime</th>

                                @if( $templateUser->is_system_user || in_array('change_users', $templatePermissions) || in_array('delete_users', $templatePermissions) )

                                    <th>Action</th>

                                @endif
                            </tr>
                            </thead>

                            <tbody>
                            @if(!empty($users))
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->country->name }}</td>
                                        <td>{{ $user->province }}</td>
                                        <td>{{ $user->constituency }}</td>
                                        <td>{{ $user->sub_county }}</td>
                                        <td>{{ $user->created_at }}</td>

                                        @if( $templateUser->is_system_user || in_array('change_users', $templatePermissions) || in_array('delete_users', $templatePermissions))

                                            <td>
                                                @if( $templateUser->is_system_user || in_array('change_users', $templatePermissions) )
                                                    <a href="{{url('/users/'. $user->id . '/edit')}}"
                                                       class="btn btn-xs btn-primary mb-2">
                                                        <i class="ace-icon fa fa-pencil bigger-130"></i> Edit
                                                    </a>
                                                @endif

                                                @if( $templateUser->is_system_user || in_array('change_users', $templatePermissions) )
                                                    <form action="{{url('/users', ['id' => $user->id])}}" method="POST"
                                                          onsubmit="return confirm('Are you sure?')"
                                                          style="display: inline-block;">
                                                        @method('DELETE')
                                                        @csrf
                                                        @if($user->active == 1)
                                                            <button class="btn btn-danger btn-xs">
                                                                <i class="ace-icon bigger-100"></i> Deactive
                                                            </button>
                                                        @else
                                                            <button class="btn btn-success btn-xs">
                                                                <i class="ace-icon  bigger-100"></i> Active
                                                            </button>
                                                        @endif
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

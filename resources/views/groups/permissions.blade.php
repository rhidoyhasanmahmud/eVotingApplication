@extends('layouts.backend')

@section('title', 'Group Permissions')

@section('content_header', 'Group Permissions')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('groups.partial.listButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('/groups/' . $group->id . '/permissions')}}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-sm-8">
                                    <div id="accordion" class="accordion-style2">
                                    @if(!empty($modules))
                                        @foreach($modules as $module)
                                        <div class="group">
                                            <h3 class="accordion-header">{{ $module->label }}</h3>

                                            <div>

                                                @foreach($module->permissions as $singlePermission)
                                                    <input type="checkbox" name="permission_id[]" value="{{ $singlePermission->id }}"
                                                       id="{{ $singlePermission->id }}" class="singlePermission"
                                                       <?php echo !empty($group_permissions) && in_array($singlePermission->id, $group_permissions) ? 'checked' : ''; ?>
                                                    >
                                                    {{ $singlePermission->name }}
                                                @endforeach
                                            </div>
                                        </div>
                                        @endforeach
                                    @else
                                        <h1>No Modules Found...</h1>
                                    @endif
                                    </div><!-- #accordion -->
                                </div><!-- ./span -->
                            </div>
                            <br>
                            <br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <button type="submit" class="btn btn-sm btn-success"> Submit
                                        <i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <!-- page specific plugin scripts -->
    <script src="{{ asset('/assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{ asset('/assets/js/jquery.ui.touch-punch.min.js')}}"></script>
    <script>
        //jquery accordion
        $( "#accordion" ).accordion({
            collapsible: true ,
            heightStyle: "content",
            animate: 250,
            header: ".accordion-header"
        }).sortable({
            axis: "y",
            handle: ".accordion-header",
            stop: function( event, ui ) {
                // IE doesn't register the blur when sorting
                // so trigger focusout handlers to remove .ui-state-focus
                ui.item.children( ".accordion-header" ).triggerHandler( "focusout" );
            }
        });


        $(document).ready(function () {
            $('.singlePermission').change(function (e) {
                e.preventDefault();
                id = $(this).attr('id');
                element = $('#'+id);
                check = $(this).is(":checked");
                if(check)
                {
                    element.attr('checked', true)
                } else {
                    element.removeAttr('checked')
                }
            })
        })

    </script>
@endsection

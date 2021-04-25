@if( $templateUser->is_system_user || in_array('view_modules', $templatePermissions) )
	<a href="{{url('/modules')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-list bigger-130"></i> Modules List
	</a>
@endif

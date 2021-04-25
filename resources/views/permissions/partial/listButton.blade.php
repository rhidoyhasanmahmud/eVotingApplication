@if( $templateUser->is_system_user || in_array('view_permissions', $templatePermissions) )
	<a href="{{url('/permissions')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-list bigger-130"></i> View Permissions
	</a>
@endif

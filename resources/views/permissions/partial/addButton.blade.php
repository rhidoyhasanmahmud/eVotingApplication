@if( $templateUser->is_system_user || in_array('add_permissions', $templatePermissions) )
	<a href="{{url('/permissions/create')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-plus-circle bigger-130"></i> Add Permission
	</a>
@endif

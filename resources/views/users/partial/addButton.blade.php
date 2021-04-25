@if( $templateUser->is_system_user || in_array('add_users', $templatePermissions) )
	<a href="{{url('/users/create')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-plus-circle bigger-130"></i> Add User
	</a>
@endif

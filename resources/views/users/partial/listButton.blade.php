@if( $templateUser->is_system_user || in_array('view_users', $templatePermissions) )
	<a href="{{url('/users')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-list bigger-130"></i> View List
	</a>
@endif

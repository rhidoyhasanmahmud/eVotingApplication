@if( $templateUser->is_system_user || in_array('view_groups', $templatePermissions) )
	<a href="{{url('/groups')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-list bigger-130"></i> View Groups
	</a>
@endif

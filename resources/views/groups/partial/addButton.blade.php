@if( $templateUser->is_system_user || in_array('add_groups', $templatePermissions) )
	<a href="{{url('/groups/create')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-plus-circle bigger-130"></i> Add Group
	</a>
@endif

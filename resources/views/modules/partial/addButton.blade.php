@if( $templateUser->is_system_user || in_array('add_modules', $templatePermissions) )
	<a href="{{url('/modules/create')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-plus-circle bigger-130"></i> Add Module
	</a>
@endif

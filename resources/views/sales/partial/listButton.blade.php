@if( $templateUser->is_system_user || in_array('view_sales', $templatePermissions) )
	<a href="{{url('/sales')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-list bigger-130"></i> View Sales
	</a>
@endif

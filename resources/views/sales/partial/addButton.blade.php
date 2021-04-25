@if( $templateUser->is_system_user || in_array('add_sales', $templatePermissions) )
	<a href="{{url('/sales/create')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-plus-circle bigger-130"></i> Add Sales
	</a>
@endif

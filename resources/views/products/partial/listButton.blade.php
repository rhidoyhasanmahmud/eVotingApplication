@if( $templateUser->is_system_user || in_array('view_products', $templatePermissions) )
	<a href="{{url('/products')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-list bigger-130"></i> View Products
	</a>
@endif

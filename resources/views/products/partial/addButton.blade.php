@if( $templateUser->is_system_user || in_array('add_products', $templatePermissions) )
	<a href="{{url('/products/create')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-plus-circle bigger-130"></i> Add Product
	</a>
@endif

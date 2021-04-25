@if( $templateUser->is_system_user || in_array('add_product_category', $templatePermissions) )
	<a href="{{url('/product_category/create')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-plus-circle bigger-130"></i> Add Product Category
	</a>
@endif

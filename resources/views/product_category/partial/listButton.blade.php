@if( $templateUser->is_system_user || in_array('view_product_category', $templatePermissions) )
	<a href="{{url('/product_category')}}" class="btn btn-xs btn-primary" >
		<i class="ace-icon fa fa-list bigger-130"></i> Product Category List
	</a>
@endif

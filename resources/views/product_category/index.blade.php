@extends('layouts.backend')

@section('title', 'List of Product Category')

@section('content_header', 'List of Product Category')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header">
				@include('product_category.partial.addButton')
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<table id="list-table" class="table table-striped table-bordered table-hover">
						<thead>
							<tr>
								<th>Name</th>
								@if( $templateUser->is_system_user || in_array('change_product_category', $templatePermissions) || in_array('delete_product_category', $templatePermissions) )

								<th>Action</th>

								@endif
							</tr>
						</thead>

						<tbody>
						@if(!empty($productCategories))
							@foreach($productCategories as $product_category)
							<tr>
								<td>{{ $product_category->name }}</td>

								@if( $templateUser->is_system_user || in_array('change_product_category', $templatePermissions) || in_array('delete_product_category', $templatePermissions))

								<td>
									@if( $templateUser->is_system_user || in_array('change_modules', $templatePermissions) )
									<a href="{{url('/product_category/'. $product_category->id . '/edit')}}" class="btn btn-xs btn-primary mb-2" >
										<i class="ace-icon fa fa-pencil bigger-130"></i> Edit
									</a>
									@endif

									@if( $templateUser->is_system_user || in_array('change_product_category', $templatePermissions) )
									<form action="{{url('/product_category', ['id'=>$product_category->id])}}" method="POST" onsubmit="return confirm('Are you sure?')" style="display: inline-block;">
                                    	@method('DELETE')
                                    	@csrf
                                    	<button class="btn btn-danger btn-xs">
                                    		<i class="ace-icon fa fa-trash-o bigger-130"></i> Delete
                                    	</button>
                                    </form>
									@endif
								</td>
								@endif
							</tr>
							@endforeach
						@endif
						</tbody>
					</table>
				</div>
			</div>
		</div>

	</div>
</div>

@endsection

@section('scripts')
	<script src="{{ asset('/assets/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{ asset('/assets/js/jquery.dataTables.bootstrap.min.js')}}"></script>

	<script type="text/javascript">
		jQuery(function($) {

	    	let table = $('#list-table').DataTable({
		        "responsive": true,
		        "pageLength": 50
		    });

			// Sort by datatable desc
	    	table.order( [ 0, 'asc' ] )
	    	.draw();

		})
	</script>
@endsection

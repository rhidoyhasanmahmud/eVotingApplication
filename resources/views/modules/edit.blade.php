@extends('layouts.backend')

@section('title', 'Edit Module')

@section('content_header', 'Edit Module')

@section('content')

<div class="row">
	<div class="col-xs-12">
		<div class="widget-box">
			<div class="widget-header">
				@include('modules.partial.listButton')
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<form action="{{url('modules', ['id' => $module->id])}}" method="POST">
						@method('PATCH')
						@csrf

						<div class="row">
							<div class="col-xs-5">
								<div class="form-group">
									<label for="label">Module Label <sup class="text-danger">*</sup></label>
									<input type="text" name="label" value="{{ $module->label }}" placeholder="Enter Label" class="form-control" id="label">
									@error('label')
							        	<div class="text-danger">{{ $message }}</div>
							        @enderror
								</div>
							</div>
							<div class="col-xs-5">

								<div class="form-group">
									<label for="url">Module Url</label>
									<input type="text" value="{{ $module->label }}"  placeholder="Enter Url" class="form-control" id="url" disabled>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-12">
								<button type="submit" class="btn btn-sm btn-success"> Submit
									<i class="ace-icon fa fa-arrow-right icon-on-right bigger-110"></i>
								</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection

@extends('layouts.backend')

@section('title', 'Edit Permission')

@section('content_header', 'Edit Permission')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('permissions.partial.listButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('/permissions', ['id'=>$permission->id])}}" method="POST">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="name">Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value="{{ $permission->name }}"
                                               placeholder="Enter Permission Name" class="form-control" id="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="codename">Codename <sup class="text-danger">*</sup></label>
                                        <input type="text" value="{{ $permission->codename }}" placeholder="Enter Permission Codename" class="form-control" id="codename" disabled>

                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="module">Module <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="module" id="module" required>
                                            <option value="">Select Module</option>
                                        @if(!empty($modules))
                                            @foreach($modules as $module)
                                                <option value="{{ $module->id }}"
                                                   <?php echo $permission->module_id == $module->id ? 'selected="selected"' : ''; ?> >{{ $module->label }}</option>
                                            @endforeach
                                        @endif
                                        </select>

                                        @error('module')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
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

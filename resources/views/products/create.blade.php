@extends('layouts.backend')

@section('title', 'Add Product')

@section('content_header', 'Add Product')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('products.partial.listButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('/products')}}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="name">Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                               placeholder="Enter product Name" class="form-control" id="name" >
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="price">Price <sup class="text-danger">*</sup></label>
                                        <input type="number" name="price" value="{{ old('price') }}"
                                               placeholder="Enter product Price" class="form-control" id="price" step="0.01">
                                        @error('price')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="product_type">Product Type <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="product_type" id="product_type" required>
                                            <option value="">Select Module</option>
                                            @if(!empty($product_types))
                                                @foreach($product_types as $product_type)
                                                    <option value="{{ $product_type->id }}">{{ $product_type->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('product_type')
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

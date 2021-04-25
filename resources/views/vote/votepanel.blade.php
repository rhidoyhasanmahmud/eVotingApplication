@extends('layouts.backend')

@section('title', 'Opinion')

@section('content_header', 'Opinion')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
               
                <div class="widget-body">
                    <div class="widget-main">
                        <form action="" method="POST">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="form-group">
                                        <label for="name">Question <sup class="text-danger">*</sup></label>
                                        <input style="font-weight: bold;" type="text" name="name" value="Are you happy with current education system in kenya?"
                                               placeholder="Enter Full Name" class="form-control" id="name" readonly="">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="email">Answer</label>
                                        <input type="text" name="email"
                                               placeholder="Enter Answer" class="form-control" id="email"
                                               >
                                        @error('email')
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

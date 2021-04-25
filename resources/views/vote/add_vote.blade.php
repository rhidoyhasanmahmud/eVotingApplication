@extends('layouts.backend')

@section('title', 'Add Vote')

@section('content_header', 'Add Vote')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('question')}}" method="POST">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="name">Question <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value=""
                                               placeholder="Enter Question" class="form-control" id="name">
                                      
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

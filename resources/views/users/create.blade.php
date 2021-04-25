@extends('layouts.backend')

@section('title', 'Add Office Employee')

@section('content_header', 'Add Office Employee')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('users.partial.listButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('users')}}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="name">Full Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value="{{ old('name') }}"
                                               placeholder="Enter Full Name" class="form-control" id="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="email">Email <sup class="text-danger">*</sup></label>
                                        <input type="text" name="email" value="{{ old('email') }}"
                                               placeholder="Enter Email Address" class="form-control" id="email">
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="country">Country <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="country_id" id="country" required>
                                            <option value="">Select Country</option>
                                            @if(!empty($country))
                                                @foreach($country as $cty)
                                                    <option value="{{ $cty->id }}">{{ $cty->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('country')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="province">Province <sup class="text-danger">*</sup></label>
                                        <input type="text" name="province" value="{{ old('province') }}"
                                               placeholder="Enter Province" class="form-control" id="province">
                                        @error('province')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="constituency">Constituency <sup class="text-danger">*</sup></label>
                                        <input type="text" name="constituency" value="{{ old('constituency') }}"
                                               placeholder="Enter Constituency" class="form-control" id="constituency">
                                        @error('constituency')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="sub_county">Sub County <sup class="text-danger">*</sup></label>
                                        <input type="text" name="sub_county" value="{{ old('sub_county') }}"
                                               placeholder="Enter Sub County" class="form-control" id="sub_county">
                                        @error('sub_county')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="password">Password <sup class="text-danger">*</sup></label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                               placeholder="Enter passworde" class="form-control" id="password">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="repeat_password">Repeat Password <sup class="text-danger">*</sup></label>
                                        <input type="password" name="repeat_password" value="{{ old('repeat_password') }}"
                                               placeholder="Enter passworde" class="form-control" id="repeat_password">
                                        @error('repeat_password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="group">Group <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="role_id" id="group" required>
                                            <option value="">Select Group</option>
                                            @if(!empty($groups))
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}">{{ $group->name }}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('group')
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

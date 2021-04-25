@extends('layouts.backend')

@section('title', 'Edit User')

@section('content_header', 'Edit User')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">
                    @include('users.partial.listButton')
                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('users',['id'=>$users->id])}}" method="POST">
                            @method('PATCH')
                            @csrf

                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="name">Full Name <sup class="text-danger">*</sup></label>
                                        <input type="text" name="name" value="{{ $users->full_name }}"
                                               placeholder="Enter Full Name" class="form-control" id="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email" value="{{$users->email }}"
                                               placeholder="Enter Email Address" class="form-control" id="email"
                                               readonly>
                                        @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="mobile">Mobile Number</label>
                                        <input type="text" name="mobile" value="{{ $users->mobile }}"
                                               placeholder="Enter Mobile Number" class="form-control" id="mobile">
                                        @error('mobile')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" value="{{ $users->password }}"
                                               placeholder="Enter password" class="form-control" id="password">
                                        @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label for="group">Group <sup class="text-danger">*</sup></label>
                                        <select class="form-control" name="group" id="group" required>
                                            <option value="">Select Group</option>
                                            @if(!empty($groups))
                                                @foreach($groups as $group)
                                                    <option value="{{ $group->id }}"
                                                    <?php echo $users->group_id == $group->id ? 'selected="selected"' : ''; ?> >{{ $group->name }}</option>
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

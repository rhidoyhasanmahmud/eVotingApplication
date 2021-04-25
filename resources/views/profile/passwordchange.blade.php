@extends('layouts.backend')

@section('title', 'Password Change')

@section('content_header', 'Password Change')

@section('content')

    <div class="row">
        <div class="col-xs-12">
            <div class="widget-box">
                <div class="widget-header">

                </div>

                <div class="widget-body">
                    <div class="widget-main">
                        <form action="{{url('/password-update')}}" method="POST">
                            @csrf
                            @if($user->password)
                                <div class="row">
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Current Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" data-validation="required"
                                                   data-validation-length="min6" name="old_password" id="old_password"
                                                   placeholder="Current Password" required="required"/>
                                            <span class="required_msg" id="id_old_pass" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2">New Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" data-validation="required"
                                                   data-validation-length="min6" placeholder="Type New Password"
                                                   name="password" id="password" required="required"/>
                                            <span class="required_msg" id="id_new_pass" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Re-type New Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" data-validation="required"
                                                   placeholder="Re-Type New Password" name="confpass" id="confpass"
                                                   required="required"/>
                                            <span class="required_msg" id="id_retype_new_pass" style="color:red"></span>
                                            <span class="required_msg" id="success_message" style="color:green"></span>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                </div>
                            @else
                                <div class="row">
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2">New Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" data-validation="required"
                                                   data-validation-length="min6" placeholder="Type New Password"
                                                   name="password" id="new_password" required="required"/>
                                            <span class="required_message" id="id_new_password" style="color:red"></span>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="passwordchange" value="1"/>
                                <div class="row">
                                    <div class="space-4"></div>
                                    <div class="form-group">
                                        <label class="col-sm-2">Re-type New Password</label>
                                        <div class="col-sm-3">
                                            <input type="password" class="form-control" data-validation="required"
                                                   placeholder="Re-Type New Password" name="confpass" id="new_confpass"
                                                   required="required"/>
                                            <span class="required_message" id="id_retype_new_password" style="color:red"></span>
                                            <span class="required_message" id="success_msg" style="color:green"></span>
                                        </div>
                                    </div>
                                    <div class="space-4"></div>
                                </div>
                            @endif
                            <div class="row">
                                <div class="space-4"></div>
                                <div class="col-sm-12">
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
@section('scripts')

    <script>
        var allowsubmit = false;
        $(function () {
            //on keypress
            $('#confpass').keyup(function (e) {
                //get values
                var pass = $('#password').val();
                var oldpass = $.trim($('#old_password').val());
                var confpass = $.trim($(this).val());
                if (oldpass !== '') {
                    //check the strings
                    if (pass === confpass) {
                        $('#success_message').text('Password matching');
                        $('#id_old_pass').text('');
                        $('#id_retype_new_pass').text('');
                        //if both are same remove the error and allow to submit
                        allowsubmit = true;
                    } else {
                        $('#success_message').text('');
                        $('#id_old_pass').text('');
                        //if not matching show error and not allow to submit
                        $('#id_retype_new_pass').text('These passwords dont match.');
                        allowsubmit = false;
                    }
                } else {
                    $('#id_retype_new_pass').text('');
                    $('#success_message').text('');
                    $('#id_old_pass').text('Current Password Require.');
                    allowsubmit = false;
                }
            });
            //jquery form submit
            $('#form').submit(function () {
                var pass = $('#password').val();
                var confpass = $('#confpass').val();
                if (pass === confpass && pass.length > 5) {
                    return true;
                } else {
                    return false;
                }
            });
        });
    </script>
    <script>
        var allowsubmit = false;
        $(function () {
            //on keypress
            $('#new_confpass').keyup(function (e) {
                //get values
                var pass = $('#new_password').val();
                var confpass = $.trim($(this).val());
                if (pass === confpass) {
                    $('#success_msg').text('Password matching');
                    $('#id_retype_new_password').text('');
                    //if both are same remove the error and allow to submit
                    allowsubmit = true;
                } else {
                    $('#success_msg').text('');
                    //if not matching show error and not allow to submit
                    $('#id_retype_new_password').text('These passwords dont match.');
                    allowsubmit = false;
                }
            });
            //jquery form submit
            $('#form').submit(function () {
                var pass = $('#new_password').val();
                var confpass = $('#new_confpass').val();
                if (pass === confpass && pass.length > 5) {
                    return true;
                } else {
                    return false;
                }
            });
        });
    </script>
@endsection


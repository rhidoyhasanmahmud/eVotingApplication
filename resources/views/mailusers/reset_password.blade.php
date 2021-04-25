<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico">
    <link rel='stylesheet' href="{{asset('/front/css/custom.css')}}">
    <link rel='stylesheet' href="{{asset('/front/css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>
<body>
<div class="row" style="width:800px; margin:0 auto;">
    <div class="col-xs-4">
        <div class="logo" style="padding-left: 20%">
            <a id="logo" href="" title="BeTheme - Best Html Theme Ever">
                <img height="100px" width="100px" src="{{ asset('/front/images/logo1.jpg')}}"
                     alt="logo"/>
            </a>
        </div>
        <h3 class="title"><b>Reset Password</b></h3>
        <p>Reset password for access account.</p>
    </div>
    <div class="col-xs-12 col-sm-12">
        <div id="contactWrapper">

            <form action="{{url('/passwordupdate')}}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{$token}}">
                <div class="row">
                    <label>New Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control"
                               data-validation="required,length" required="required" id="password"
                               data-validation-length="min6" name="new_password"
                               placeholder="New Password"/>
                    </div>
                </div>
                <div class="row">
                    <label>Re-Type New Password</label>
                    <div class="form-group">
                        <input type="password" class="form-control" id="confpass" required="required"
                               name="retype_new_password"
                               data-validation="confirmation" placeholder="Re-Type New Password"/>
                        <span class="required_msg" id="id_retype_new_pass" style="color:red"></span>
                        <span class="required_msg" id="success_message" style="color:green"></span>
                    </div>
                </div>
                <br>
                <div class="row">

                    <button type="submit" class="btn btn-info"><i class="icon-paper-plane"></i>
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-form-validator/2.3.26/jquery.form-validator.min.js"></script>
<script>
    var allowsubmit = false;
    $(function () {
        //on keypress
        $('#confpass').keyup(function (e) {
            //get values
            var pass = $.trim($('#password').val());
            var confpass = $.trim($(this).val());
            //check the strings
            if (pass === confpass) {
                $('#success_message').text('Password matching');
                $('#id_retype_new_pass').text('');
                //if both are same remove the error and allow to submit
                allowsubmit = true;
            } else {
                if (confpass !== '') {
                    $('#success_message').text('');
                    //if not matching show error and not allow to submit
                    $('#id_retype_new_pass').text('These passwords dont match.');
                    allowsubmit = false;
                }
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
</body>
</html>

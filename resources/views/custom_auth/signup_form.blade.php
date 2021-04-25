<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Registration - Electoral Commission</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{asset('/assets/font-awesome/4.5.0/css/font-awesome.min.css') }}" />

    <!-- text fonts -->
    <link rel="stylesheet" href="{{asset('/assets/css/fonts.googleapis.com.css') }}" />

    <!-- ace styles -->
    <link rel="stylesheet" href="{{asset('/assets/css/ace.min.css') }}" />

</head>

<!-- light-login/blur-login -->
<body class="login-layout light-login">
<div class="main-container">
    <div class="main-content">
        <div class="row">
            <div class="col-sm-10 col-sm-offset-1">
                <div class="login-container">
                    <br>
                    <br>
                    <div class="center">
                        <h1>
                            <span class="blue" id="id-text2">Registration - Electoral Commission</span>
                        </h1>
                      
                    </div>

                    <div class="space-6"></div>

                    <div class="position-relative">

                        <div class="signup-box visible widget-box no-border">
                            <div class="widget-body">
                                <div class="widget-main">
                                    <h4 class="header green lighter bigger">
                                        <i class="ace-icon fa fa-users blue"></i>
                                        New User Registration
                                    </h4>

                                    <div class="space-6"></div>
                                    @if(session()->has('message'))
                                        <div class="alert alert-danger">
                                            {{ session('message') }}
                                        </div>
                                    @endif
                                    <p> Enter your details to begin: </p>

                                    <form action="{{url('/signup')}}" method="post">
                                        @csrf
                                        <fieldset>
                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" class="form-control" name="name" placeholder="Enter Full Name" required="required"/>
															<i class="ace-icon fa fa-user"></i>
														</span>
                                                @error('name')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="email" name="email" class="form-control" placeholder="Enter Email Address" required="required"/>
															<i class="ace-icon fa fa-envelope"></i>
														</span>
                                                @error('email')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="password" class="form-control" placeholder="Password" required="required"/>
															<i class="ace-icon fa fa-lock"></i>
														</span>
                                                @error('password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>

                                            <label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="repeat_password" class="form-control" placeholder="Repeat password" required="required"/>
															<i class="ace-icon fa fa-retweet"></i>
														</span>
                                                @error('repeat_password')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>
                                             <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="constituency" name="constituency" class="form-control" placeholder="Enter Constituency" required="required"/>
                                                            <i class="ace-icon fa fa-map-marker"></i>
                                                        </span>
                                                @error('constituency')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>
                                             <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="province" name="province" class="form-control" placeholder="Enter Province Name" required="required"/>
                                                            <i class="ace-icon fa fa-map-marker"></i>
                                                        </span>
                                                @error('province')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>
                                             <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <input type="sub_county" name="sub_county" class="form-control" placeholder="Enter Sub County" required="required"/>
                                                            <i class="ace-icon fa fa-map-marker"></i>
                                                        </span>
                                                @error('sub_county')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>
                                             <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <select class="form-control" name="country_id" id="country_id" required>
                                                            <option value="">Select Country</option>
                                                            <option value="1">Kenya</option>
                                                            <option value="2">USA</option>
                                                            <option value="3">Bangladesh</option>
                                                            <i class="ace-icon fa fa-envelope"></i>
                                                        </select>
                                                        </span>
                                                @error('country_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>

                                            <label class="block clearfix">
                                                        <span class="block input-icon input-icon-right">
                                                            <select class="form-control" name="role_id" id="role_id" required>
                                                            <option value="">Select Role Type</option>
                                                            <option value="2">Polling Station</option>
                                                            <option value="3">Voter</option>
                                                            <i class="ace-icon fa fa-envelope"></i>
                                                        </select>
                                                        </span>
                                                @error('role_id')
                                                <div class="text-danger">{{ $message }}</div>
                                                @enderror
                                            </label>

                                            <label class="block">
                                                <input type="checkbox" class="ace" required="required"/>
                                                <span class="lbl">
															I accept the
															<a href="#">User Agreement</a>
														</span>
                                            </label>

                                            <div class="space-24"></div>

                                            <div class="clearfix">
                                                <button type="reset" class="width-30 pull-left btn btn-sm">
                                                    <i class="ace-icon fa fa-refresh"></i>
                                                    <span class="bigger-110">Reset</span>
                                                </button>

                                                <button type="submit" class="width-65 pull-right btn btn-sm btn-success">
                                                    <span class="bigger-110">Register</span>

                                                    <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                </button>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>

                                <div class="toolbar center">
                                    <a href="{{route('login')}}"  class="back-to-login-link">
                                        <i class="ace-icon fa fa-arrow-left"></i>
                                        Back to login
                                    </a>
                                </div>
                            </div><!-- /.widget-body -->
                        </div><!-- /.signup-box -->
                    </div><!-- /.position-relative -->
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.main-content -->
</div><!-- /.main-container -->

<!-- basic scripts -->

<!--[if !IE]> -->
<script src="{{asset('/assets/js/jquery-2.1.4.min.js') }}"></script>

<!-- <![endif]-->

<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js') }}"></script>
<![endif]-->
<script type="text/javascript">
    if('ontouchstart' in document.documentElement) document.write("<script src='{{asset('assets/js/jquery.mobile.custom.min.js')}}>"+"<"+"/script>");
</script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
    jQuery(function($) {
        $(document).on('click', '.toolbar a[data-target]', function(e) {
            e.preventDefault();
            var target = $(this).data('target');
            $('.widget-box.visible').removeClass('visible');//hide others
            $(target).addClass('visible');//show target
        });
    });



    //you don't need this, just used for changing background
    jQuery(function($) {
        $('#btn-login-dark').on('click', function(e) {
            $('body').attr('class', 'login-layout');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-light').on('click', function(e) {
            $('body').attr('class', 'login-layout light-login');
            $('#id-text2').attr('class', 'grey');
            $('#id-company-text').attr('class', 'blue');

            e.preventDefault();
        });
        $('#btn-login-blur').on('click', function(e) {
            $('body').attr('class', 'login-layout blur-login');
            $('#id-text2').attr('class', 'white');
            $('#id-company-text').attr('class', 'light-blue');

            e.preventDefault();
        });

    });
</script>
</body>
</html>

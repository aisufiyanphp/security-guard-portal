<!doctype html>
<html class="no-js" lang="en">
<head>
    <title>Login</title>
    <meta name="robots" content="noindex">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="{{url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/themify-icons.css')}}">
    <!-- others css -->
    <link rel="stylesheet" href="{{url('assets/css/typography.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/default-css.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/styles.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/responsive.css')}}">
</head>
<body>
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- login area start -->
    <div class="login-area">
        <div class="container">
            <div class="login-box ptb--100">
                <form action="{{ route("login-proccess") }}" method="post">
                    @csrf
                    <div class="login-form-head">
                        <h4>Login</h4>
                        <p>Hello, Sign in and Start Managing your Website from Admin Panel</p>
                    </div>
                    {!! displayErrorMassage('error') !!}
                    <div class="login-form-body">
                        <div class="form-gp">
                            <label for="email">Email address</label>
                            <input type="email" name="email">
                            <i class="ti-email"></i>
                            @error("email")
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-gp">
                            <label for="password">Password</label>
                            <input type="password" name="password" autocomplete="off">
                            <i class="ti-lock"></i>
                            @error("password")
                            <div class="text-danger">{{ $message }}</div>
                             @enderror
                        </div>
                        <div class="submit-btn-area">
                            <button id="form_submit" type="submit" style="background-color:#2c71da;color:white;font-weight:800;">Login Now <i class="ti-arrow-right"></i></button>
                        </div>
                        <!-- <div class="form-footer text-center mt-5">
                            <p class="text-muted"><a href="forgot-password.php">Forgot Password?</a></p>
                        </div> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- login area end -->
    <!-- jquery latest version -->
    <script src="{{url('assets/js/vendor/jquery-2.2.4.min.js')}}"></script>
    <!-- bootstrap 4 js -->
    <script src="{{url('assets/js/popper.min.js')}}"></script>
    <script src="{{url('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        var preloader = $('#preloader');
        $(window).on('load', function() {
            setTimeout(function() {
                preloader.fadeOut('slow', function() { $(this).remove(); });
            }, 300)
        });
    });
    </script>
</body>
</html>

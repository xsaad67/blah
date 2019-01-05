@extends('layouts.main')

@section('css')


    <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' type='text/css'>

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/animate.css")}}'>

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/hamburgers.min.css")}}'>

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/select2.min.css")}}'>

    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/util.css")}}'>
    <link rel="stylesheet" type="text/css" href='{{asset("wp-content/themes/mediumishh/assets/css/main.css")}}'>

<style>
.site-content{
    background: #9053c7 !important;
    background: -webkit-linear-gradient(-135deg, #c850c0, #4158d0) !important;
    background: -o-linear-gradient(-135deg, #c850c0, #4158d0) !important;
    background: -moz-linear-gradient(-135deg, #c850c0, #4158d0) !important;
    background: linear-gradient(-135deg, #c850c0, #4158d0) !important;
}
    .wrap-login100{
        padding-top:100px !important;
    }

    .help-block{
            display: block;
    margin-top: 5px;
    margin-bottom: 10px;
    color: #b151c3;
    margin-left: 10px;
    }
</style>

@endsection


@section('content')

    <div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt" data-tilt>
                <img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
            </div>

        <form class="login100-form validate-form" method="POST" action="{{ route('login') }}">
                   {{ csrf_field() }}
            <span class="login100-form-title">
                Member Login
            </span>

    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
        <input class="input100" type="text" name="email" value="{{ old('email') }}" placeholder="Email">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                </span>
    </div>

              @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif

            <div class="wrap-input100 validate-input" data-validate = "Password is required">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Login
                </button>
            </div>

            <div class="text-center p-t-12">
                <span class="txt1">
                    Forgot
                </span>
                <a class="txt2" href="#">
                    Username / Password?
                </a>
            </div>

            <div class="text-center p-t-136">
                <a class="txt2" href="/register">
                    Create your Account
                    <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                </a>
            </div>
        </form>
     
         </div>
    </div>
</div>
    

@endsection

@section('footer')

<script type='text/javascript' src='{{asset("wp-includes/js/jquery/jqueryb8ff.js?ver=1.12.4")}}'></script>
    <script src='{{asset("wp-content/themes/mediumishh/assets/js/popper.min.js")}}'></script>
    <script src='{{asset("wp-content/themes/mediumishh/assets/js/select2.min.js")}}'></script>

    <script src='{{asset("wp-content/themes/mediumishh/assets/js/tilt.jquery.min.js")}}'></script>
    <script >
        jQuery('.js-tilt').tilt({
            scale: 1.1
        })
    </script>
   {{--  <script src='{{asset("wp-content/themes/mediumishh/assets/js//main.js")}}'></script> --}}

@endsection

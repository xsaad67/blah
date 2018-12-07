@extends('layouts.auth.main')

@section('css')

<style>
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

        <form class="login100-form validate-form" method="POST"  action="{{ route('register') }}">
           {{ csrf_field() }}
            <span class="login100-form-title">
                Member Register
            </span>


            <div class="wrap-input100 validate-input" data-validate = "Name is required">
                <input class="input100" type="text" name="name" value="{{ old('name') }}" placeholder="Name">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-user" aria-hidden="true"></i>
                </span>

            </div>


                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                @endif

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
             
            </div>

               @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif

            <div class="wrap-input100 validate-input" data-validate = "Confirm Password is required">
                <input class="input100" type="password" name="password_confirmation" placeholder="Confirm Password">
                <span class="focus-input100"></span>
                <span class="symbol-input100">
                    <i class="fa fa-lock" aria-hidden="true"></i>
                </span>
             
            </div>
            {{--<div class="g-recaptcha" data-sitekey="6LdsAVMUAAAAADwL6OUwmv60-hz-tR2WohuNfTZ_"></div>--}}
            
            {{--
            @if ($errors->has('captcha'))
                <span class="help-block">
                    <strong>{{ $errors->first('captcha') }}</strong>
                </span>
            @endif
            --}}

            
            <div class="container-login100-form-btn">
                <button class="login100-form-btn">
                    Register
                </button>
            </div>

            <div class="text-center p-t-12">
                <span class="txt1">
                    Already Registered
                </span>
                <a class="txt2" href="/login">
                    Login To Account
                </a>
            </div>

            
        </form>


@endsection
<script src='https://www.google.com/recaptcha/api.js'></script>

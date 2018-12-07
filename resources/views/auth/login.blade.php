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


@endsection

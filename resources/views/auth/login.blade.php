@extends('layouts.app')
@section('content')
<div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">{{ __('Login') }}</h3>
                    </div>
                    <div class="panel-body">
                        <form id="LoginForm" method="POST" action="{{ route('login') }}" role="form">
                            @csrf
                            <fieldset>
                                <div class="form-group">
                                    <label>Email: <sup class="text-danger">*</sup></label>
                                    <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Password: <sup class="text-danger">*</sup></label>
                                    <input id="password" type="password" placeholder="Password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="checkbox">
                                    <label for="brand1">
                                        <input type="checkbox" id="brand1" name="remember" {{ old('remember') ? 'checked' : '' }}>Remember Me
                                    </label>
                                    <!-- Change this to a button or input when using this as a form -->
                                    <a class="btn btn-link pull-right" style="margin-top: -7px;" href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                                </div>
                                <input class="btn btn-sm btn-success btn-block" type="submit" name="Sign In" value="Login">
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                                <h6>Not a member?<a class="btn btn-link" href="{{ route('register') }}"> Sign up now</a>
                                <a class="btn btn-sm btn-success" href="{{ url('/') }}">Return to Home</a></h6>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

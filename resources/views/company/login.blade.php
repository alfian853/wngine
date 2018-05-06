@extends('layouts.master')

@section('title', 'Login')

@section('add-script')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
@endsection


@section('header')
<header>
    @include('template.header_login')
</header>
@endsection

@section('content')
<div class="container">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('post.company.login') }}" role="form">
                        {{ csrf_field() }}
			<h2>Login</h2><hr>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Login
                                </button>

                                <a class="btn btn-link" href="{{ route('company.password.reset') }}">
                                    Forgot Your Password?
                                </a>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
@endsection

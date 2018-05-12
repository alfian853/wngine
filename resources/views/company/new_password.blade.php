@extends('layouts.master')

@section('title', 'Reset Password')

@section('add-script')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('css/reset.css') }}">
@endsection

@section('content')
<div class="container">
        <div class="col-md-12 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('post.company.password.reset') }}" role="form">
                        {{ csrf_field() }}
			                      <h2>Reset Password</h2><hr>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                            <label for="password_1" class="col-md-4 control-label">New password</label>
                            <div class="col-md-12">
                                <input id="password_1" type="password" class="form-control" name="password_1" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="email" class="col-md-12 control-label">Retype new password</label>
                            <div class="col-md-12">
                                <input id="password_2" type="password" class="form-control" name="password_2" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="email" value="@php echo $_GET['email']; @endphp"/>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
        </div>
    </div>
</div>
</div>
@endsection

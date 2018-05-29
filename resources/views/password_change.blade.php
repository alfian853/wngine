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
                    <form class="form-horizontal" method="POST" action="{{ route('password_change') }}" role="form">
                        {{ csrf_field() }}
			                      <h2>Reset Password</h2><hr>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}" >
                            <label for="password_old" style="font-weigth:bold" class="col-md-12 control-label">Old password</label>
                            <div class="col-md-12">
                                <input id="password_old"  type="password" class="form-control" name="old_password" required>
                                @if ($errors->has('old_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('old_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="password_1" style="font-weigth:bold;margin-top:15px;" class="col-md-12 control-label">New password</label>
                            <div class="col-md-12">
                                <input id="password_1" type="password" class="form-control" name="new_password" required>
                                @if ($errors->has('new_password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('new_password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="email" style="font-weigth:bold;margin-top:15px;" class="col-md-12 control-label">Retype new password</label>
                            <div class="col-md-12">
                                <input id="password_2" type="password" class="form-control" name="new_password_confirmation" required>
                            </div>
                        </div>
                        <input type="hidden" name="email" value=""/>

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

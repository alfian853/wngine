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
                    <form class="form-horizontal" method="POST" action="{{ route('post.member.password.request') }}" role="form">
                        {{ csrf_field() }}
			                  <h2>Reset Password</h2>
                        <div class="form-group" >
                            <label for="email" class="col-md-12 control-label">E-Mail Address</label>
                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                {{-- @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif --}}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    Send to Email
                                </button>
                            </div>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
@endsection

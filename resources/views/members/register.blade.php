@extends('layouts.master')

@section('title', 'Register')

@section('add-script')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('css/registerCompany.css') }}">
@endsection

@section('content')
<div class="container">
  <form class="form-horizontal" style="margin-top:10%" role="form" action="{{route('post.member.register')}}" method="post">
	<h2>Form Registration</h2>
	<hr>
	{{ csrf_field() }}
	<div class="form-group">
	  <div class="col-sm-12">
      <div class="text-center">
       	<img src="//placehold.it/120" class="avatar img-circle" alt="avatar">
        <h6>Profile Image</h6>
        <input class="form-control" name="photo" type="file">
      </div>
		</div>
		<hr>
		</div>
		<div class="form-group">
			<label for="name" class="container control-label">Full Name
        {!! $errors->first('name','<span class="help-block text-danger">*:message</span>') !!}
      </label>
			<div class="col-sm-12">
				<input type="text" name="name" placeholder="Name" class="form-control" value="{{old('name')}}" autofocus>
			</div>
		</div>

		<div class="form-group">
			<label for="password" class="container control-label">Password
        {!! $errors->first('password','<span class="help-block text-danger">*:message</span>') !!}
      </label>
			<div class="col-sm-12">
				<input type="password" name="password" placeholder="Password" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="password_confirmation" class="container control-label">Re-type Password
        {!! $errors->first('password_confirmation','<span class="help-block text-danger">*:message</span>') !!}
      </label>
			<div class="col-sm-12">
				<input type="password" name="password_confirmation" placeholder="Re-Type password" class="form-control">
			</div>
		</div>


		<div class="form-group">
      <label for="email" class="container control-label">Email
        {!! $errors->first('email','<span class="help-block text-danger">*:message</span>') !!}
      </label>
			<div class="col-sm-12">
				<input type="email" name="email" placeholder="Email" value="{{old('email')}}" class="form-control">
			</div>
		</div>

		<div class="form-group">
		  <label for="" class="container control-label">Address
        {!! $errors->first('address','<span class="help-block text-danger">*:message</span>') !!}
      </label>
		  <div class="col-sm-12">
				<input type="text" name="address" placeholder="Address" value="{{old('address')}}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="" class="container control-label">Telephone
        {!! $errors->first('telp','<span class="help-block text-danger">*:message</span>') !!}
      </label>
			<div class="col-sm-12">
				<input type="text" name="telp" placeholder="Telephone Number" value="{{old('telp')}}" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="" class="container control-label">Borndate
        {!! $errors->first('tgllahir','<span class="help-block text-danger">*:message</span>') !!}
      </label>
			<div class="col-sm-12">
				<input type="date" name="tgllahir" placeholder="Borndate" value="{{old('tgllahir')}}" class="form-control">
			</div>
		</div>
		<hr>
		<div class="form-group">
			<div class="col-sm-12 col-sm-offset-3">
				<input type="submit" value="Register" class="btn btn-primary btn-block">
			</div>
		</div>
	</form>
</div>
@endsection

@extends('layouts.master')

@section('title', 'Register')

@section('add-script')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
@endsection


@section('header')
<header>
    @include('template.company_header')
</header>
@endsection


@section('content')
<div class="container">
	<form class="form-horizontal" style="margin-top:10%" role="form" action="{{ route('post.company.register') }}" method="post">
	<h2 class="col-lg-12 d-flex justify-content-center">Form Registration</h2>
	<hr>
	{{ csrf_field() }}
		<div class="form-group">
		<div class="col-sm-12">
        		<div class="text-center">
       		 		<img src="//placehold.it/120" class="avatar img-circle" alt="avatar">
        			<h6>Company Profile Image</h6>
        			<input class="form-control" name="photo" type="file">
        		</div>
		</div>
		<hr>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Full Name</label>
			<div class="col-sm-12">
				<input type="text" name="name" placeholder="Name" class="form-control" autofocus>
				@if ($errors->has('name'))
					<div> {{ $errors->first('name') }} </div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Password</label>
			<div class="col-sm-12">
				<input type="password" name="password" placeholder="Password" class="form-control">
			</div>
			@if ($errors->has('password'))
				<div> {{ $errors->first('password') }} </div>
			@endif
		</div>

		<div class="form-group">
			<label for="" class="col-sm-5 control-label">Re-type Password</label>
			<div class="col-sm-12">
				<input type="password" name="password_confirmation" placeholder="Re-Type password" class="form-control">
			</div>
		</div>


		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Email</label>
			<div class="col-sm-12">
				<input type="email" name="email" placeholder="Email" class="form-control">
				@if ($errors->has('email'))
					<div> {{ $errors->first('email') }} </div>
				@endif
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Address</label>
			<div class="col-sm-12">
				<input type="text" name="address" placeholder="Address" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Telephone</label>
			<div class="col-sm-12">
				<input type="text" name="telp" placeholder="Telephone Number" class="form-control">
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

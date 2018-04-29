@extends('layouts.master')

@section('title', 'Register')

@section('add-script')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('css/register.css') }}">
@endsection


@section('header')
<header>
  @if(!empty(Session::get('login')))
    @include('template.header_login')
  @else
    @include('template.header')
  @endif
</header>
@endsection


@section('content')
<div class="container">
	<h2>Form Regitration</h2>
	<form class="form-horizontal" role="form" action="/members" method="post">
	{{ csrf_field() }}
		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Full Name</label>
			<div class="col-sm-12">
				<input type="text" name="name" placeholder="Name" class="form-control" autofocus>
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Password</label>
			<div class="col-sm-12">
				<input type="password" name="password" placeholder="Password" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-5 control-label">Re-type Password</label>
			<div class="col-sm-12">
				<input type="password" name="repassword" placeholder="Re-Type password" class="form-control">
			</div>
		</div>


		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Email</label>
			<div class="col-sm-12">
				<input type="email" name="email" placeholder="Email" class="form-control">
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

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Borndate</label>
			<div class="col-sm-12">
				<input type="date" name="tgllahir" placeholder="Borndate" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-12 col-sm-offset-3">
				<input type="submit" value="Register" class="btn btn-primary btn-block">
			</div>
		</div>
	</form>
</div>
@endsection
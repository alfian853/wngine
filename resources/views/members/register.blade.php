@extends('layouts.master')

@section('title', 'Register')

@section('add-css')
  @parent
  <link rel="stylesheet" href="css/register.css">
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
	<h2>Form Regitration</h2><hr>
	<form class="form-horizontal" role="form" action="/members" method="post">
	{{ csrf_field() }}
		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Full Name</label>
			<div class="col-sm-9">
				<input type="text" name="name" placeholder="Name" class="form-control" autofocus>
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Password</label>
			<div class="col-sm-9">
				<input type="password" name="password" placeholder="password" class="form-control">
			</div>
		</div>		

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Email</label>
			<div class="col-sm-9">
				<input type="email" name="email" placeholder="Email" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Address</label>
			<div class="col-sm-9">
				<input type="text" name="address" placeholder="Address" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Telephone</label>
			<div class="col-sm-9">
				<input type="text" name="telp" placeholder="Telephone Number" class="form-control">
			</div> 
		</div>

		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Borndate</label>
			<div class="col-sm-9">
				<input type="date" name="tgllahir" placeholder="Borndate" class="form-control">
			</div>
		</div>

		<div class="form-group">
			<div class="col-sm-9 col-sm-offset-3">
				<input type="submit" value="Register" class="btn btn-primary btn-block">
			</div>
		</div>
	</form>
</div>
@endsection

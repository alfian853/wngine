@extends('layouts.master')

@section('title', 'Posting Job')

@section('add-script')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('css/posting.css') }}">
@endsection


@section('header')
<header>
    @include('template.header_user_profile')
</header>
@endsection


@section('content')
<div class="container">
	<form class="form-horizontal" role="form" action="{{ route('post.company.postingJob.validation') }}" method="post">
	<h2>Posting Job</h2>
	<hr>
	{{ csrf_field() }}
		<div class="form-group">
        <label for="" class="col-sm-4 control-label">Additional Document</label>
		<div class="col-sm-12">
        		<div class="text-center">
        			<input class="form-control" name="photo" type="file">
        		</div>
		</div>
		<hr>
		</div>
		<div class="form-group">
			<label for="" class="col-sm-3 control-label">Job Name</label>
			<div class="col-sm-12">
				<input type="text" name="name" placeholder="Name" class="form-control" autofocus>
			</div>
		</div>

        <div class="form-group">
			<label for="" class="col-sm-3 control-label">Job Type</label>
			<div class="col-sm-12">
				<input type="text" name="name" placeholder="Name" class="form-control" autofocus>
                <select>
                    <option>Test1</option>
                    <option>Test2</option>
                    <option>Test3</option>
                </select>
			</div>
		</div>

        <div class="form-group">
			<label for="" class="col-sm-3 control-label">Due to</label>
			<div class="col-sm-12">
				<input type="date" name="finishDate" placeholder="dd/mm/yyyy" class="form-control">
			</div>
		</div>

    	<div class="form-group">
			<label for="" class="col-sm-3 control-label">Job Point</label>
			<div class="col-sm-12">
				<input type="number" name="point" placeholder="Point" value="50" class="form-control">
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

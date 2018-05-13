@extends('layouts.master')

@section('title', 'Posting Job')

@section('add-script')
  @parent
  <link rel="stylesheet" type="text/css" href="{{ asset('css/posting.css') }}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="{{ asset('js/postjob.js') }}"></script>
@endsection


@section('header')
<header>
    @include('template.header_user_profile')
</header>
@endsection


@section('content')
<div class="container">
	<form class="form-horizontal" role="form" action="{{ route('post.company.postingJob') }}" method="post">
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
				<input type="text" name="name" placeholder="Name" class="form-control" autofocus/>
			</div>
		</div>


    <div class="form-group">
			<label for="" class="col-sm-3 control-label">Due to</label>
			<div class="col-sm-12">
				<input type="date" name="finishDate" placeholder="dd/mm/yyyy" class="form-control">
			</div>
		</div>

    <div class="form-group">
      <label class="col-sm-3 control-label d-flex">Job Point</label>
        <div class="col-sm-12">
          <div class="row d-flex justify-content-center">
          <div class="col-sm-5">
            <p style="text-align:center;">Skill</p>
          </div>
          <div class="col-sm-2">
            <p style="text-align:center;">Point</p>
          </div>
          <div class="col-sm-3">
            <p style="text-align:center;">Rp 50.000/point</p>
          </div>
          </div>
        </div>
        <input id="job-list" type="hidden" name="job_list" value="">

        <div class="col-sm-12">
        <div class="row d-flex justify-content-center">
          <div class="col-sm-5">
            <select id="input-skill" type="text" style="width:100%;text-align:center" placeholder="skill" class="js-example-basic-single d-flex justify-content-center">
              <option value="1">front-end</option>
              <option value="2">back-end</option>
              <option value="3">android</option>
              <option value="4">ios</option>
            </select>
          </div>
          <div class="col-sm-2 d-flex justify-content-center">
            <input id="input-point" type="number" name="point" placeholder="Point" value="50" class="form-control"/>
          </div>
          <div class="col-sm-3 d-flex justify-content-center">
            <input type="button" id="add-skill" value="Add" class="hehe"/>
          </div>
        </div>
        </div>
      <div class="col-sm-12" id="skill-list">
      </div>
    </div>

    <hr>
    <div class="form-group">
      <label for="" class="col-sm-5 control-label">Short description</label>
      <div class="col-sm-12">
        <textarea rows="" cols="" name="shortDescription"  style="width: inherit;"></textarea>
      </div>
    </div>

		<div class="form-group">
			<div class="col-sm-12 col-sm-offset-3">
				<input id="submit-job" type="submit" value="Submit" class="btn btn-primary btn-block">
			</div>
		</div>

	</form>
</div>
@endsection

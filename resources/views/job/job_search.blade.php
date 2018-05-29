@extends('layouts.master')

@section('title', 'Job Search')

@section('add-script')
  @parent
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
  <link href="{{asset('css/job_search.css')}}" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Bungee+Inline" rel="stylesheet"> 
@endsection

@section('content')
<p style="text-align:center;font-size:100px;font-family:Bungee Inline">Wngine</p>
<div class="container" style="margin-top:10px;">
    <div class="row justify-content-center d-flex">
        <div class="col-xs-8 col-xs-offset-2">
  		    <div id="search-form" method="post" action="/action" class="input-group">
              <div class="input-group-btn search-panel">
                <button id="category-btn" type="button" style="width:150px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                	 <span id="search_concept">By name</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li id="by-name"><a href="#by-name">By name</a></li>
                  <li id="by-category"><a href="#by-category">By category</a></li>
                </ul>
              </div>
                <input type="hidden" name="search_param" value="all" id="search_param"/>
                <input id="search-text" type="text" name="input-by-name" placeholder="search by name"/>

                <span class="input-group-btn">
                    <button id="search-btn" class="btn btn-default" style="height:100%" type="button"><i class="fa fa-search"></i></button>
                </span>
              </div>
        </div>
	</div>
</div>

<div id="search-result" class="container">

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"/></script>
<script src="{{ asset('js/jobsearch.js') }}"></script>
@endsection

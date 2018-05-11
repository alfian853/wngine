@extends('layouts.master')

@section('title', 'Home')

@section('add-script')
  @parent
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
  <link href="{{asset('css/joblist.css')}}" rel="stylesheet" />
@endsection


@section('content')

<div class="container" style="margin-top:200px;">
    <div class="row justify-content-center d-flex">
        <div class="col-xs-8 col-xs-offset-2">
  		    <div id="search-form" method="post" action="/action" class="input-group">
            {{ csrf_field() }}
              <div class="input-group-btn search-panel">
                <button id="category-btn" type="button" style="width:150px;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                	 <span id="search_concept">By name</span> <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" role="menu">
                  <li id="by-name"><a href="#contains">By name</a></li>
                  <li id="by-category"><a href="#its_equal">By category</a></li>
                </ul>
              </div>
                <input type="hidden" name="search_param" value="all" id="search_param"/>
                <select id="search-select2" name="query[]" style="height:100%" multiple="true"></select>
                <span class="input-group-btn">
                    <button id="search-btn" class="btn btn-default" style="height:100%" type="button"><i class="fa fa-search"></i></button>
                </span>
              </div>
        </div>
	</div>
</div>

<div class="container search-result-container" style="margin-top: 60px">
  <div class="row" style="border:1px solid red;padding:10px">
    <div class="col-sm-2" style="border:1px solid red;">
      <img src="{{asset('assets/stuff.jpg')}}" width="100%" height="100%"/>
    </div>
    <div class="col-sm-10 row" style="border:1px solid yellow;">
      <div class="col-sm-8" style="border:1px solid red;">
        <h3>
          front-end developer
        </h3>
        <p>
          Submisikan hasil karya terbaikmu: Aplikasi Web/Mobile/Desktop, Games, atau IoT, untuk mendapatkan slot pameran BEKRAF Developer Day Jayapura
        </p>
      </div>
      <div class="col-sm-4" style="border:1px solid red;">
        <div class="container">
          Skill :
          <i class="fa fa-desktop"></i>
          <i class="fa fa-android"></i>
          <i class="fa fa-code"></i>
        </div>
        <div class="container">
          <i class="icomoon icon-coin"></i>
          Total point : 300
          <img src="{{asset('assets/gold_coin.png')}}" width="20px" height="20px"/>
        </div>
        <div class="container">
          <i class="fa fa-gift"></i>
          Reward : 300$ + certificate
        </div>
        <div class="container">
          <i class="fa fa-hourglass"></i>
          19 Hari : 23 Jam : 54 Menit
        </div>



    </div>
  </div>

</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"/></script>
<script src="{{ asset('js/jobsearch.js') }}"></script>
@endsection

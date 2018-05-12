@extends('layouts.master')

@section('title', 'Home')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection



@section('content')
<div class="container-fluid" id="home-search">
  <div class="col-sm-2"></div>
      <form id="search-form" class="h-100 col-sm-8" method="post" action="/action">
        {{ csrf_field() }}
        <select id="tes" name="query[]" style="" class="js-example-basic-multiple" multiple="multiple" name="search-query">
          <option value="volvo">Volvo</option>
          <option value="saab">Saab</option>
          <option value="fiat">Fiat</option>
          <option value="audi">Audi</option>
        </select>
        <button id="search-button" type="button" name="button"><i class="fa fa-search"></i></button>
      </form>
  <div class="col-sm-2"></div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"/></script>
<script src="{{ asset('js/home.js') }}"></script>
@endsection

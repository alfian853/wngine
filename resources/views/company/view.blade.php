@extends('layouts.master')

@section('title', 'Home')

@section('add-script')
  @parent
  <link rel="stylesheet" href="css/home.css">
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
<div class="container-fluid" id="home-search">
  <div class="row container-fluid">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
        <form id="fpass-form" class="h-100" method="post" action="arahkan ke controller">
          <input type="text" name="search-query" placeholder="Job??"/>
          <button id="search-button" type="button" name="button"><i class="fa fa-search"></i></button>
          <select name="cars">
            <option value="volvo">Volvo</option>
            <option value="saab">Saab</option>
            <option value="fiat">Fiat</option>
            <option value="audi">Audi</option>
          </select>
        </form>
      </div>
      <div class="col-sm-2"></div>
  </div>
</div>

@endsection
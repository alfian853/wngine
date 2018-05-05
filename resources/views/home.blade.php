@extends('layouts.master')

@section('title', 'Home')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('header')
<header>
    @if (Auth::check())
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
          <input type="text" name="search-query" placeholder="Enter some keywords"/>
          <button id="search-button" type="button" name="button"><i class="fa fa-search"></i></button>
          <select name="cars" id="optionDropDown">
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

<div class="container">
  <!-- Trigger the modal with a button -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Login</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form action="members/login" method="post">
            {{ csrf_field() }}
            <div class="form-group">
              <label for="email">Email:</label>
              <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
              <label for="pwd">Password:</label>
              <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
            </div>
            <div class="checkbox">
              <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-default">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</div>



@endsection

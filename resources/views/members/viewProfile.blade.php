@extends('layouts.master')

@section('title', 'View Profile')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
  <script src="{{ asset('js/profile.js') }}"></script>
@endsection

@section('header')
<header>
    @include('template.header_user_profile')
</header>
@endsection


@section('content')
<div class="container">
    <div class="row" style="margin-top:20px;"> 
        <div class=" col-lg-12 d-flex justify-content-center" style="height:300px;">
            <img src="{{ asset('assets/officedesk.jpg') }}" width="400" height="300" class= "img-thumbnail">
        </div>
    </div>

    <hr>

    <div class="row">  
        <div class ="col-lg-4" style="border:1px solid black;height:75px;">skill</div>
        <div class ="col-lg-4" style="border:1px solid black;height:75px;">poin</div>
        <div class ="col-lg-4" style="border:1px solid black;height:75px;">star</div>
    </div>

    <hr>

    <div class="row">  
        <button class="col-lg-4" id="btn1">Biodata</button>
        <button class="col-lg-4" id="btn2">On Progress</button>
        <button class="col-lg-4" id="btn3">History</button>
    </div>

    <div class="row" id="text1" style="border:1px solid black;height:500px;"> 
        Text1 of button clicked
    </div>
    <div class="row" id="text2" style="border:1px solid black;height:500px;"> 
        Text2 of button clicked
    </div>
    <div class="row" id="text3" style="border:1px solid black;height:500px;"> 
        Text3 of button clicked
    </div>
</div>
@endsection

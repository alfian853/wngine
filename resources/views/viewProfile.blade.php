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

    <div class="row"> 
        <div class="col-lg-12 d-flex justify-content-center" style="border:1px solid black;height:250px;">
            <div class ="col-lg-6" style="border:1px solid black;height:250px;">Image</div>
        </div>
    </div>

    <div class="row">  
        <div class="col-lg-12 d-flex justify-content-center" style="border:1px solid black;height:75px;">
            <div class ="col-lg-4" style="border:1px solid black;height:75px;">Name</div>
        </div>
    </div>

    <div class="row">  
        <div class ="col-lg-6" style="border:1px solid black;height:75px;">Star</div>
        <div class ="col-lg-6" style="border:1px solid black;height:75px;">Poin</div>
    </div>

    <div class="row">  
        <button class="btn btn-primary col-lg-4">Biodata</button>
        <button class="btn btn-primary col-lg-4">On Progress</button>
        <button class="btn btn-primary col-lg-4">History</button>
    </div>

    <div class="row" style="border:1px solid black;height:500px;"> 
        Text of button clicked
    </div>
</div>
@endsection

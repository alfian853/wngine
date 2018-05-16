@extends('layouts.master')

@section('title', 'Home')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid">
<div class="row">
  <div class="col-lg-12">
  <div id="carouselExampleIndicators"  class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block img-fluid w-100" style="height:400px" src="{{ asset('assets/officedesk.jpg') }}" alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid w-100" style="height:400px" src="{{ asset('assets/officedesk.jpg') }}" alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block img-fluid w-100" style="height:400px" src="{{ asset('assets/officedesk.jpg') }}" alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
  <div class="col-lg-12" style="border:1px solid black;height:auto;margin-top:10px;">
    <div class="row d-flex">
      <div class="col-lg-4" style="border:1px solid black;height:auto">
        <div class="col-lg-12" style="border:1px solid black;height:100px">
          <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="border:1px solid black;height:50px">
          <h2 style="text-align:center;">Title1</h2>
        </div>
        <div class="col-lg-12" style="border:1px solid black;height:auto">
          <p style="padding:10px 30px;font-style:italic;">
          Nulla ornare, nulla et egestas hendrerit, ipsum dui vulputate dolor, 
          et ornare orci erat eleifend pede. Fusce eros libero, vestibulum non, elementum eu, 
          suscipit eget, leo. Donec consectetuer tincidunt diam.
          Sed et mauris in ligula feugiat hendrerit. 
          Cras neque purus, mollis non.
          </p>
        </div>
      </div>
      <div class="col-lg-4" style="border:1px solid black;height:auto">
        <div class="col-lg-12" style="border:1px solid black;height:100px">
        <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="border:1px solid black;height:50px">
          <h2 style="text-align:center;">Title2</h2>
        </div>
        <div class="col-lg-12" style="border:1px solid black;height:auto">
          <p style="padding:10px 30px;font-style:italic;">
          Nulla ornare, nulla et egestas hendrerit, ipsum dui vulputate dolor, 
          et ornare orci erat eleifend pede. Fusce eros libero, vestibulum non, elementum eu, 
          suscipit eget, leo. Donec consectetuer tincidunt diam.
          Sed et mauris in ligula feugiat hendrerit. 
          Cras neque purus, mollis non.
          </p>
        </div>
      </div>
      <div class="col-lg-4" style="border:1px solid black;height:auto">
        <div class="col-lg-12" style="border:1px solid black;height:100px">
        <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="border:1px solid black;height:50px">
          <h2 style="text-align:center;">Title3</h2>
        </div>
        <div class="col-lg-12" style="border:1px solid black;height:auto">
          <p style="padding:10px 30px;font-style:italic;">
          Nulla ornare, nulla et egestas hendrerit, ipsum dui vulputate dolor, 
          et ornare orci erat eleifend pede. Fusce eros libero, vestibulum non, elementum eu, 
          suscipit eget, leo. Donec consectetuer tincidunt diam.
          Sed et mauris in ligula feugiat hendrerit. 
          Cras neque purus, mollis non.
          </p>
        </div>
      </div>
      <div class="col-lg-12" style="border:1px solid black;height:auto;margin-top:20px;">
        <h2 style="text-align:center;font-style:italic;font-weight:bold;margin-top:10px;">
          Your work is going to fill a whole part of your life, and the only way to be truly satisfied
          is to do what you believe is great work. And the only way to do great work is to love what you do
        </h2>
        <h4 style="text-align:center">--Steve Jobs--</h4>
        <div class="col-lg-12 mx-auto d-flex justify-content-center">
          <div class="btn btn-primary" style="margin-top:30px;">&#8711;</div>
        </div>
      </div>
    </div>
    <div id="news_update" class="row" style="height:auto;margin-top:10px;margin-bottom:10px;">
      <div class="col-lg-12" id="header" style="background:Grey;height:100px;border-bottom:">
        <h1>News and Update</h1>
      </div>
      <div class="col-lg-12" id="contain" style="background:green;height:500px;">
        <div class="row">
          <div class="col-lg-4" id="leftContain" style="background:red;height:500px;">
            Menulist
          </div>
          <div class="col-lg-8" id="rightContain" style="background:blue;height:500px;">
            <div class="row">
              <div class="col-lg-12" style="background:violet;height:350px;">
                  image and slideshow
              </div>
              <div class="col-lg-12" style="background:orange;height:150px;">
                  short description
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
</div>

@endsection

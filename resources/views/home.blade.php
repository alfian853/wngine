@extends('layouts.master')

@section('title', 'Home')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid">

  <div id="carouselExampleIndicators" class="carousel slide row" data-ride="carousel">
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

  <div class="col-lg-12" style="height:auto">
    <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;font-size:60px;font-weight:bold">Our Advantages</h1>
  </div>

    <div class="row d-flex justify-content-center">
      <div class="col-lg-4" style="height:auto">
        <div class="col-lg-12" style="height:100px">
          <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="height:auto;margin-top:10px;margin-bottom:10px">
          <h2 style="text-align:center;">Advanced Your Skill</h2>
        </div>
        <div class="col-lg-12" style="height:auto">
          <p style="border-top:2px dashed black;text-align:center;padding:10px 30px;font-style:italic;">
            Join us will be the best solution for you to improve your skill in technology,
            you'll get exercise to handle so many type of job which is unconsciously increase
            your skill. We are a versed person in this part. We are very sure that we will the right 
            person for you, so don't be hesitated with us. 
          </p>
        </div>
      </div>
      <div class="col-lg-4" style="height:auto">
        <div class="col-lg-12" style="height:100px">
        <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="height:auto;margin:10px 0">
          <h2 style="text-align:center;">You'll Get Money and Point</h2>
        </div>
        <div class="col-lg-12" style="height:auto">
          <p style="border-top:2px dashed black;text-align:center;padding:10px 30px;font-style:italic;">
          Aside from you'll improve your skill. You'll get money from company which is posted a job 
          that you take and you'll get coin from system based on criteria. The coin is very useful, 
          cause it's can be used for you to get the more level of confidence from the related company, in 
          other words it can make you easier to get a job.
          </p>
        </div>
      </div>
      <div class="col-lg-4" style="height:auto">
        <div class="col-lg-12" style="height:100px">
        <img id="quote" src="{{ asset('assets/quote.png') }}" alt="quote">
        </div>
        <div class="col-lg-12" style="height:auto;margin:10px 0">
          <h2 style="text-align:center;">Expand Your Connection</h2>
        </div>
        <div class="col-lg-12" style="height:auto">
          <p style="border-top:2px dashed black;text-align:center;padding:10px 30px;font-style:italic;">
            Without you being aware, in the process of doing your task, you'll do a formal 
            communication with person in company. So you get good communication lesson at a time
            you expand you connection. In the future of your career this part is one of the most important
            thing.
          </p>
        </div>
      </div>
    </div>

    <div class="col-lg-12" style="height:auto;margin-top:20px;">
      <h2 style="text-align:center;font-style:italic;font-weight:bold;margin-top:10px;padding:30px;">
        Your work is going to fill a whole part of your life, and the only way to be truly satisfied
        is to do what you believe is great work. And the only way to do great work is to love what you do
      </h2>
      <div class="col-lg-12 h4 d-flex justify-content-center">--Steve Jobs--</div>
      <div class="col-lg-12 d-flex justify-content-center">
        <div class="btn btn-primary" style="margin-top:10px;">&#8711;</div>
      </div>
    </div>
    
    <div class="row" style="background:#1c7776;height:auto;margin-top:10px;padding:50px;">
      <div class="col-lg-12 h1" style="margin-bottom:50px;font-size:75px;text-align:center;color:white;letter-spacing:5px;font-family: serif;">Our Contact</div>  
      <div class="col-lg-4" style="height:auto"> 
        <div class="row justify-content-center" style="height:auto">
          <div class="row" style="height:100px;width:100px;">
            <img style="h-100 w-100" src="{{ asset('assets/phone.png') }}" alt="phone logo">
          </div>
        </div>
        <div class="row justify-content-center" style="height:auto">
          <div class="row" style="height:auto;">
            <h2 style="text-align:center;color:white;font-weight:bold">Phone</h2>
          </div>
        </div>
        <div class="col-lg-12" style="border-top:5px double white;height:250px;padding-top:30px;">
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Main Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">031-7321117</div>
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Branch Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">061-6320115</div>
        </div>
      </div>
     
      <div class="col-lg-4" style="height:auto"> 
        <div class="row justify-content-center" style="height:auto">
          <div class="row" style="height:100px;width:100px;">
            <img style="h-100 w-100" src="{{ asset('assets/location.png') }}" alt="phone logo">
          </div>
        </div>
        <div class="row justify-content-center" style="height:auto">
          <div class="row" style="height:auto;">
            <h2 style="text-align:center;color:white;font-weight:bold">Address</h2>
          </div>
        </div>
        <div class="col-lg-12" style="border-top:5px double white;height:250px;padding-top:30px;">
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Main Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">Sidoarjo, East Java, Indonesia</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">Jalan Makmur 8a, Komplek Indahri Blok B, No. 80</div>
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Branch Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">Surabaya, East Java, Indonesia</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">Jalan Kedongdoro 3a, Perumnas Blok 3c, No.78-79</div>
        </div>
      </div>
      
      <div class="col-lg-4" style="height:auto"> 
        <div class="row justify-content-center" style="height:auto">
          <div class="row" style="height:100px;width:100px;">
            <img style="h-100 w-100" src="{{ asset('assets/email.png') }}" alt="phone logo">
          </div>
        </div>
        <div class="row justify-content-center" style="height:auto">
          <div class="row" style="height:auto;">
            <h2 style="text-align:center;color:white;font-weight:bold">Email</h2>
          </div>
        </div>
        <div class="col-lg-12" style="border-top:5px double white;height:250px;padding-top:30px;">
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Main Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">wngine.noreply@gmail.com</div>
          <div class="row h5 d-flex justify-content-center" style="color:white;font-weight:bold">Branch Office</div>
          <div class="row h6 d-flex justify-content-center" style="font-weight:bold;font-style:italic">branchwngine.noreply@gmail.com</div>
        </div>
      </div>

    </div>
    
</div>

@endsection

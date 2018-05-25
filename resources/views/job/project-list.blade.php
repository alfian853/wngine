@extends('layouts.master')

@section('title', 'Project List')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('content')
<div class="container-fluid">

 <!--  <div id="carouselExampleIndicators" class="carousel slide row" data-ride="carousel">
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
  </div> -->

  <div class="col-lg-12" style="height:auto">
    <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;font-size:60px;font-weight:bold">Project List</h1>
  </div>
  <div id="project-list" class="" style="padding: 5%">
    <table class="table table-condensed">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Upload Date</th>
          <th>Finish Date</th>
          <th>Document</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jobs as $job)
        <tr>
          <td>{{$job->name}}</td>
          <td>{{$job->description}}</td>
          <td>{{$job->upload_date}}</td>
          <td>{{$job->finish_date}}</td>
          <td><a href="{{$job->document}}" class="btn btn-primary" download="">Download</a></td>
          <td><a href="{{url('company/project-list/take/')}}/{{$job->id}}" class="btn btn-danger">Detail</a></td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
   

    
    <div class="row" style="background:#1c7776;height:auto;position: fixed;bottom: 0;width: 100%;">
      <div class="col-lg-12 h1" style="font-size:12px;text-align:center;color:white;letter-spacing:5px;font-family: serif;">Copyright - Wngine.com</div>  
      <div class="col-lg-4" style=""> 
        
      </div>
     
      <div class="col-lg-4" style=""> 
        
      </div>
      
      <div class="col-lg-4" style=""> 
      </div>

    </div>
    
</div>

@endsection

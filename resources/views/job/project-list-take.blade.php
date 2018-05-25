@extends('layouts.master')

@section('title', 'Detail Project')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/home.css') }}">
  <script src="{{ asset('js/home.js') }}"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <style>
  #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
  #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
  #sortable li span { position: absolute; margin-left: -1.3em; }
  </style>

  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
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
  <!-- ul id="sortable">
  
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
</ul> -->

  <div class="col-lg-12" style="height:auto">
    <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;font-size:60px;font-weight:bold">Detail Project</h1>
  </div>
  <div id="project-list" class="container row" style="margin : auto;">
    <div class="col-md-1">
      <table class="table table-condensed">
        <thead>
          <tr>
            <th>Rank</th>
          </tr>
        </thead>
        <tbody id="">
          @php $i = 1; @endphp
          @foreach($lists as $list)
          <tr>
            <td height="55">{{$i}}</td>
          </tr>
          @php $i++; @endphp
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-11">
      <table class="table table-condensed" style="min-height: 25px;height: 25px;">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Telephone</th>
            <th>Address</th>
            <!-- <th>Photo</th> -->
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="sortable">
          @foreach($lists as $list)
          <tr>
            <span class="" >
              <td height="50">{{$list->m_name}}</td>
              <td height="50">{{$list->email}}</td>
              <td height="50">{{$list->m_telp}}</td>
              <td height="50">{{$list->m_address}}</td>
              <!-- <td><img src="{{URL::to($list->m_image)}}" style="width: 100%"></td> -->
              <td height="50"><a href="#" class="btn btn-danger btn-sm">Action</a></td>
            </span>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
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

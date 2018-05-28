@extends('layouts.master')

@section('title', 'View Profile')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/profileCompany.css') }}">
  <script src="{{ asset('js/profileCompany.js') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
  <script src="{{asset('js/dropzone.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <div class="col-lg-12" style="margin-top:10px;">
        <div class="row d-flex justify-content-center">
            <div class="h1" style="font-family:Arial black;font-weight:bold;text-align:center">IT Company</div>
        </div>
        <img src="{{ asset('assets/officedesk.jpg') }}" class= "h-50 rounded img-fluid mx-auto d-block ">
        <div class="row d-flex justify-content-center">
            @if(Auth::guard('company')->check() && Auth::guard('company')->user()->can('create', \App\Job::class))
            <div class="btn btn-danger" style="margin:5px 2px;" >Posting Job</div>
            <div class="btn btn-warning" style="margin: 5px 2px;" data-toggle="modal" data-target="#modal-edit-pict">Change Picture</div>
            @endif
            @if(Auth::guard('member')->check() && Auth::guard('member')->user()->can('write_testimony', \App\Company::class))
                <div class="btn btn-warning" style="margin-left: 2px;" data-toggle="modal" data-target="#modalContactForm3">Add Testimoni</div>
            @endif
        </div>
    </div>

    <hr>

    <div class="col-sm-12" style=" height:auto">
        <div class="col-sm-12 btn btn-primary" id="t1">Company Name</div>
        <div class="col-sm-12 btn btn-default" id="s1">IT Company</div>
        <div class="col-sm-12 btn btn-primary" id="t2">Owner</div>
        <div class="col-sm-12 btn btn-default" id="s2">Explain about t2</div>
        <div class="col-sm-12 btn btn-primary" id="t3">Established</div>
        <div class="col-sm-12 btn btn-default" id="s3">Explain about t3</div>
        <div class="col-sm-12 btn btn-primary" id="t4">Main Sector</div>
        <div class="col-sm-12 btn btn-default" id="s4">Explain about t4</div>
        <div class="col-sm-12 btn btn-primary" id="t5">Address</div>
        <div class="col-sm-12 btn btn-default" id="s5">Explain about t5</div>
        <div class="col-sm-12 btn btn-primary" id="t6">Email</div>
        <div class="col-sm-12 btn btn-default" id="s6">Explain about t6</div>
        <div class="col-sm-12 btn btn-primary" id="t7">Telephone Number</div>
        <div class="col-sm-12 btn btn-default" id="s7">Explain about t7</div>
        <div class="col-sm-12 btn btn-primary" id="t8">Additional Info</div>
        <div class="col-sm-12 btn btn-default" id="s8">Explain about t8</div>
    </div>

    <hr>

    <div class="col-lg-12 h1" style="font-family:Arial black;font-weight:bold;margin-top:30px;margin-bottom:30px;"><i>History Job</i></div>

    <div class="row">
        <div class="card col-lg-3" >
            <img class="card-img-top" src="{{ asset('assets/job_icon.png') }}" style="border-radius:50%;" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-lg-3" >
        <img class="card-img-top" src="{{ asset('assets/job_icon.png') }}" style="border-radius:50%;" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-lg-3" >
        <img class="card-img-top" src="{{ asset('assets/job_icon.png') }}" style="border-radius:50%;" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
        <div class="card col-lg-3" >
        <img class="card-img-top" src="{{ asset('assets/job_icon.png') }}" style="border-radius:50%;" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card title</h5>
                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>

<!--Testimoni Modal-->
<div class="modal fade" id="modalContactForm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Write You Testimoni</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                    <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
    </div>
</div>

<!--Change picture Modal-->
<div class="modal fade" id="modal-edit-pict" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Change Profile Picture</h4>
                <button id="dismiss-modal-pict" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div id="dropzone">
              <form class="dropzone needsclick" id="changePict" action="">
                <div class="dz-message needsclick" name="filenya">
                  Drop files here or click here to upload <i class="fa fa-paper-plane-o ml-1"></i><br>
                </div>
              </form>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                Please Upload jpg, jpeg or png file only
            </div>
        </div>
    </div>
</div>

<div class="col-lg-12" style="margin-bottom:50px;">
    <div class="col-md-8 offset-md-2 col-10 offset-1 mt-5">
        <h2 class="text-center mt-5 mb-5 pb-2 text-uppercase text-dark"><strong>What are our customers says ?</strong></h2>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner mt-4">
                <div class="carousel-item text-center active">
                        <div class="img-box p-1 border rounded-circle m-auto">
                            <img class="d-block w-100 rounded-circle" src="http://nicesnippets.com/demo/profile-1.jpg" alt="First slide">
                        </div>
                        <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Paul Mitchel</strong></h5>
                        <h6 class="text-dark m-0">Web Developer</h6>
                        <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                    </div>
                    <div class="carousel-item text-center">
                        <div class="img-box p-1 border rounded-circle m-auto">
                            <img class="d-block w-100 rounded-circle" src="http://nicesnippets.com/demo/profile-3.jpg" alt="First slide">
                        </div>
                        <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Steve Fonsi</strong></h5>
                        <h6 class="text-dark m-0">Web Designer</h6>
                        <p class="m-0 pt-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
                    </div>
                    <div class="carousel-item text-center">
                        <div class="img-box p-1 border rounded-circle m-auto">
                            <img class="d-block w-100 rounded-circle" src="http://nicesnippets.com/demo/profile-7.jpg" alt="First slide">
                        </div>
                        <h5 class="mt-4 mb-0"><strong class="text-warning text-uppercase">Daniel vebar</strong></h5>
                        <h6 class="text-dark m-0">Seo Analyst</h6>
                        <p class="m-0 pt-3 ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
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
        </div>
    </div>            
</div>

@endsection

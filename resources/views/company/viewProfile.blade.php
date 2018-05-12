@extends('layouts.master')

@section('title', 'View Profile')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/profileCompany.css') }}">
  <script src="{{ asset('js/profileCompany.js') }}"></script>
@endsection

@section('content')
<div class="container">
    <div class="col-lg-12" style="margin-top:10px;">
        <div class="row d-flex justify-content-center">
            <div class="h1" style="font-family:script;font-style:italic;font-weight:bold;text-align:center">IT Company</div>
        </div>
        <img src="{{ asset('assets/officedesk.jpg') }}" class= "h-50 rounded img-fluid mx-auto d-block ">
        <div class="row d-flex justify-content-center">
            <div class="btn btn-warning" style="margin-right: 2px;">Change Picture</div>
            <div class="btn btn-success" style="margin-left: 2px;">Posting Job</div>
        </div>
    </div>

    <hr>

    <div class="col-sm-12" style=" height:auto">
        <div class="col-sm-12 btn btn-primary" id="t1">Company Name</div>
        <div class="col-sm-12 btn btn-default" id="s1">Explain about t1</div>
        <div class="col-sm-12 btn btn-primary" id="t2">Established</div>
        <div class="col-sm-12 btn btn-default" id="s2">Explain about t2</div>
        <div class="col-sm-12 btn btn-primary" id="t3">Main Sector</div>
        <div class="col-sm-12 btn btn-default" id="s3">Explain about t3</div>
        <div class="col-sm-12 btn btn-primary" id="t4">Address</div>
        <div class="col-sm-12 btn btn-default" id="s4">Explain about t4</div>
        <div class="col-sm-12 btn btn-primary" id="t5">Email</div>
        <div class="col-sm-12 btn btn-default" id="s5">Explain about t5</div>
        <div class="col-sm-12 btn btn-primary" id="t6">Telephone Number</div>
        <div class="col-sm-12 btn btn-default" id="s6">Explain about t6</div>
        <div class="col-sm-12 btn btn-primary" id="t7">Additional Info</div>
        <div class="col-sm-12 btn btn-default" id="s7">Explain about t7</div>
    </div>

    <hr>

    <div class="card row" style="margin-top:20px;">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                History Project
            </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo">
            <div class="row" style="padding:15px;">
                <div class="card col-lg-3" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card col-lg-3" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card col-lg-3" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card col-lg-3" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
            <div class="row" style="padding:15px;">
                <div class="card col-lg-3" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card col-lg-3" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card col-lg-3" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card col-lg-3" >
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.master')

@section('title', 'View Profile')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
  <script src="{{ asset('js/profile.js') }}"></script>
@endsection

@section('header')
<header>
    @include('template.company_header')
</header>
@endsection


@section('content')
<div class="container">
    <div class="row" style="margin-top:20px;"> 
        <div class="col-lg-4" style="margin-top:10px;">
            <img src="{{ asset('assets/officedesk.jpg') }}" class= "h-75 rounded-circle img-fluid mx-auto d-block">
            <div class="row d-flex justify-content-center">
                <h3>Alcredo Simanjuntak</h3>
            </div>
            <div class="row d-flex justify-content-center">
                <h6 style="font-style:italic">"God in the first place"</h6>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="btn btn-success" style="margin: 0 2px;">Edit Quotes</div>
                <div class="btn btn-warning" style="margin: 0 2px;">Change Picture</div>
            </div>
        </div>
        <div class="col-lg-8" style="border:1px solid black;padding:10px 40px;height:400px;">
            <h1>Skill</h1><hr>
                
            <div class="col-12">
                <div class="progress mb-3">
                    1<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%;">25%</div>
                    Type1
                </div>
                <div class="progress mb-3">
                    2<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                    Type2
                </div>
                <div class="progress mb-3">
                    3<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                    Type3
                </div>
                <div class="progress mb-3">
                    4<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                    Type4
                </div>
                <div class="progress mb-3">
                    5<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                    Type5
                </div>
                <div class="progress mb-3">
                    6<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                    Type6
                </div>
                <div class="progress mb-3">
                    7<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                    Type7
                </div>
                <div class="progress mb-3">
                    8<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                    Type8
                </div>
                <div class="progress mb-3">
                    9<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100" style="width: 25%">25%</div>
                    Type9
                </div>
            </div>

        </div>
    </div>
    <hr>

    <div class="col-lg-12 d-flex justify-content-center">
        <div class="col-lg-6 btn btn-primary" id="point" style="border-right:1px dashed white;height:50px;"><h6>Point<br>100&#x20BD</h6></div>
        <div class="col-lg-6 btn btn-primary" id="star" style="border-left:1px dashed white;height:50px;"><h6>Star<br>50&#x2605</h6></div>
    </div>
    
    <hr>
    <div class="card">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Biodata
            </button>
            </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
            <div class="card-body">
                x1
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                On-Progress Project
            </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo">
            <div class="card-body">
                x2
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                History Project
            </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree">
            <div class="card-body">
                x3
            </div>
        </div>
    </div>
    <hr>


	<div class="row">
		<div class="col-md-8 col-center m-auto">
			<h2>Testimonials</h2>
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
				<!-- Carousel indicators -->
				<ol class="carousel-indicators">
					<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
					<li data-target="#myCarousel" data-slide-to="1"></li>
					<li data-target="#myCarousel" data-slide-to="2"></li>
				</ol>   
                
                <!-- Wrapper for carousel items -->
				<div class="carousel-inner">
					<div class="item carousel-item active">
						<div class="img-box"><img src="{{ asset('assets/officedesk.jpg') }}" alt=""></div>
						<p class="testimonial">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu sem tempor, varius quam at, luctus dui. Mauris magna metus, dapibus nec turpis vel, semper malesuada ante. Idac bibendum scelerisque non non purus. Suspendisse varius nibh non aliquet.</p>
						<p class="overview"><b>Paula Wilson</b>, Media Analyst</p>
					</div>
					<div class="item carousel-item">
						<div class="img-box"><img src="{{ asset('assets/officedesk.jpg') }}" alt=""></div>
						<p class="testimonial">Vestibulum quis quam ut magna consequat faucibus. Pellentesque eget nisi a mi suscipit tincidunt. Utmtc tempus dictum risus. Pellentesque viverra sagittis quam at mattis. Suspendisse potenti. Aliquam sit amet gravida nibh, facilisis gravida odio.</p>
						<p class="overview"><b>Antonio Moreno</b>, Web Developer</p>
					</div>
					<div class="item carousel-item">
						<div class="img-box"><img src="{{ asset('assets/officedesk.jpg') }}" alt=""></div>
						<p class="testimonial">Phasellus vitae suscipit justo. Mauris pharetra feugiat ante id lacinia. Etiam faucibus mauris id tempor egestas. Duis luctus turpis at accumsan tincidunt. Phasellus risus risus, volutpat vel tellus ac, tincidunt fringilla massa. Etiam hendrerit dolor eget rutrum.</p>
						<p class="overview"><b>Michael Holz</b>, Seo Analyst</p>
					</div>
                </div>
                
				<!-- Carousel controls -->
				<a class="carousel-control left carousel-control-prev" href="#myCarousel" data-slide="prev">
					<i class="fa fa-angle-left"></i>
				</a>
				<a class="carousel-control right carousel-control-next" href="#myCarousel" data-slide="next">
					<i class="fa fa-angle-right"></i>
				</a>
			</div>
		</div>
	</div>

</div>
@endsection

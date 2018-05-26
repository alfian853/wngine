@extends('layouts.master')

@section('title', 'View Profile')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
  <script src="{{ asset('js/profile.js') }}"></script>
@endsection

@section('content')
<div class="col-lg-12" style="margin-top:10px;">
    <img src="{{ asset('assets/officedesk.jpg') }}" class= "h-50 rounded img-fluid mx-auto d-block">
    <div class="row d-flex justify-content-center">
        <h3>Alcredo Simanjuntak</h3>
    </div>
    <div class="row d-flex justify-content-center">
        <h6 style="font-style:italic">"God in the first place"</h6>
    </div>
    <div class="col-lg-12 d-flex justify-content-center">
        <div class="btn btn-success" style="margin: 5px 2px;" data-toggle="modal" data-target="#modalContactForm2">Edit Quotes</div>
        <div class="btn btn-warning" style="margin: 5px 2px;" data-toggle="modal" data-target="#modalContactForm3">Change Picture</div>
        <div class="btn btn-primary" style="margin: 5px 2px;" data-toggle="modal" data-target="#modalContactForm">Add Testimoni</div>
    </div>
    <div class="col-lg-12 d-flex justify-content-center">
        <div class="col-lg-1" style="font-weight:bold;background:grey;border-radius:10px 0 0 10px;text-align:center;width:auto;height:40px;margin-top:10px;padding:6px">Point</div>
        <div class="col-lg-1" style="font-weight:bold;background:white;border-radius:0 10px 10px 0;text-align:center;width:auto;height:40px;margin-top:10px;padding:6px">100</div>
    </div>
</div>
<div class="container">
    <hr>
    <div class="card row">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Biodata
            </button>
            </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
            <div class="card-body" style="text-align:center">
                Alcredo Simanjuntak<br>
                08-06-1998<br>
                Jalan Melanthon Siregar Gang Kukubalam, Siantar, Sumatera Utara<br>
                simanjuntakalcredo@gmail.com<br>
                082272521290<br>
            </div>
        </div>
    </div>
    <div class="card row">
        <div class="card-header" id="headingFour">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Skill
            </button>
            </h5>
        </div>
        <div id="collapseFour" class="collapse show" aria-labelledby="headingFour">
            <div class="card-body" style="text-align:center">
                Backend<br>
                Frontend<br>
                Android Developer<br>
                PHP<br>
            </div>
        </div>
    </div>
    <div class="card row">
        <div class="card-header" id="headingTwo">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                On-Progress Project
            </button>
            </h5>
        </div>
        <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo">
            <div class="card-body" style="text-align:center">
                Scheduling App --- PrimeOne Tech<br>
                Web --- PrimeOne Tech<br>
            </div>
        </div>
    </div>
    <div class="card row">
        <div class="card-header" id="headingThree">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                History Project
            </button>
            </h5>
        </div>
        <div id="collapseThree" class="collapse show" aria-labelledby="headingThree">
            <div class="card-body" style="text-align:center">
                Script for marker --- PrimeOne Tech<br>
                Absen by Android --- PrimeOne Tech<br>
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

<!--Testimoni Modal-->
<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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

<!--Change Quote Modal-->
<div class="modal fade" id="modalContactForm2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Insert Your Quote</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="form8" class="md-textarea form-control" rows="4"></textarea>
                    <label data-error="wrong" data-success="right" for="form8">Your Quote</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique">Edit<i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
    </div>
</div>

<!--Change Picture Modal-->
<div class="modal fade" id="modalContactForm3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Change Profile Picture</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <input type="file" name="fileupload" value="fileupload" id="fileupload">
                    <label for="fileupload"> Select a image to upload</label><br>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-unique">Change<i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
    </div>
</div>

@endsection

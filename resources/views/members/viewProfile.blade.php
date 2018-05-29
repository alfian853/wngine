@extends('layouts.master')

@section('title', 'View Profile')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
  <script src="{{asset('js/dropzone.js')}}"></script>
  <script src="{{ asset('js/profile.js') }}"></script>
  <style>
    #dropzone{
      margin-left: 5%;
      margin-right: 5%;
    }
  </style>
@endsection

@section('content')
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="member-id" content="{{$user->m_id}}"/>

<div class="col-lg-12" style="margin-top:10px;">
    @if($user->m_image == "")
      <img id="profile-pict" src="{{ asset('assets/default-user.png') }}" class= "h-50 rounded img-fluid mx-auto d-block">
    @else
      <img id="profile-pict" src="{{ asset('members_photo/'.$user->m_image) }}" class= "h-50 rounded img-fluid mx-auto d-block">
    @endif
    <div class="row d-flex justify-content-center">
        <h3 id="username">{{$user->m_name}}</h3>
        @if($own_profile)
          <a href="#" data-toggle="modal" data-target="#modal-edit-name" class="fa fa-pencil prefix grey-text"></a>
        @endif
    </div>
    <div class="row d-flex justify-content-center">
        <h6 style="font-style:italic" id="id-quote">{{$user->quote}}</h6>
    </div>
    <div class="col-lg-12 d-flex justify-content-center">
      @if($own_profile)
        <div class="btn btn-success" style="margin: 5px 2px;" data-toggle="modal" data-target="#modal-quote">Edit Quotes</div>
        <div class="btn btn-warning" style="margin: 5px 2px;" data-toggle="modal" data-target="#modal-edit-pict">Change Picture</div>
        <a href="{{ route('password_change') }}" class="btn btn-danger" style="margin: 5px 2px;" >Change Password</a>
      @endif
      @if($canTest)
        <div class="btn btn-primary" style="margin: 5px 2px;" data-toggle="modal" data-target="#modal-testimoni">Add Testimoni</div>
      @endif
    </div>
    <div class="col-lg-12 d-flex justify-content-center">
        <div class="col-lg-1" style="font-weight:bold;background:grey;border-radius:10px 0 0 10px;text-align:center;width:auto;height:40px;margin-top:10px;padding:6px">Point</div>
        <div class="col-lg-1" style="font-weight:bold;background:white;border-radius:0 10px 10px 0;text-align:center;width:auto;height:40px;margin-top:10px;padding:6px">{{$user->total_point}}</div>
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
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne">
            <div class="card-body" style="text-align:center">
                Email : {{$user->email}}<br>
                Telephone : {{$user->m_telp}}<br>
                Birthday : {{$user->m_borndate}}<br>
                Address : {{$user->m_address}}<br>
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
        <div id="collapseFour" class="collapse" aria-labelledby="headingFour">
            <div class="card-body" style="text-align:center">
                @php $max=count($user->skills_name) @endphp
                @for($i=0;$i<$max ; $i++)
                  @switch($user->skills_id[$i])
                    @case("1")
                    <i class="fa fa-desktop"></i>
                    @break
                    @case("2")
                    <i class="fa fa-code"></i>
                    @break
                    @case("3")
                    <i class="fa fa-android"></i>
                    @break
                    @case("4")
                    <i class="fa fa-apple"></i>
                    @break
                  @endswitch
                  {{$user->skills_name[$i]}} : {{$user->skills_point[$i]}}<br />
                @endfor
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
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
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
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
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

<div class="modal fade" id="modal-edit-name" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h5 class="modal-title w-100 font-weight-bold">Write your new nickname</h5>
          <button id="dismiss-change-name" type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body mx-3">
          <div class="md-form">
            <label data-error="wrong" data-success="right" for="form8">Your new nickname</label>
            <input type="text" id="name-input" class="md-textarea form-control"></input>
          </div>
          <button id="submit-name" class="btn btn-unique">change nickname<i class="fa fa-paper-plane-o ml-1"></i></button>
        </div>
      </div>
    </div>
</div>


<!--Testimoni Modal-->
<div class="modal fade" id="modal-testimoni" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Write You Testimoni</h4>
                <button id="dismiss=testimoni" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="edit-testimoni" class="md-textarea form-control" rows="4"></textarea>
                    <label data-error="wrong" data-success="right" for="form8">Your message</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="submit-testimoni" class="btn btn-unique">Send <i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
    </div>
</div>


<!--Change Quote Modal-->
<div class="modal fade" id="modal-quote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Insert Your Quote</h4>
                <button id="dismiss-quote" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">
                <div class="md-form">
                    <i class="fa fa-pencil prefix grey-text"></i>
                    <textarea type="text" id="edit-quote" class="md-textarea form-control" rows="4"></textarea>
                    <label data-error="wrong" data-success="right" for="form8">Your Quote</label>
                </div>
            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button id="submit-quote" class="btn btn-unique">Edit<i class="fa fa-paper-plane-o ml-1"></i></button>
            </div>
        </div>
    </div>
</div>

<!--Change Picture Modal-->
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
              <form class="dropzone needsclick" id="changePict" action="{{route('post.member.changePict',['nick' => $user->m_name ]) }}">
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



<script type="text/javascript">
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


</script>
@endsection

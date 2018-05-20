@extends('layouts.master')

@section('title', 'Job Description')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/jobdescription.css') }}">
  <script src="{{asset('js/jobdetail.js')}}"></script>
@endsection

@section('content')
<div class="container">
    <input id="job-id" type="hidden" value="{{$data['id']}}"/>
    {{csrf_field()}}
    {{-- <meta name="_token" content="{!! csrf_token() !!}" /> --}}

    <div class="col-lg-12" style="margin-top:10px;">
        <div class="row d-flex justify-content-center">
            <div class="h1" style="font-family:script;font-style:italic;font-weight:bold;text-align:center">{{ $data['job_name'] }}</div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <img src="{{ $data['company_photo'] }}" class= "h-100 w-100 rounded img-fluid mx-auto d-block ">
                <div class="row d-flex justify-content-center"></div>
            </div>
        <div class="col-lg-6">
            <div class="card row">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                            Due Date
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo">
                    {{ $data['start_date'] }} to {{ $data['due_date'] }}
                </div>
            </div>
            <div class="card row">
                <div class="card-header" id="headingThree">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                            Point
                        </button>
                    </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree">
                    {{ $data['total_point']}}
                </div>
            </div>
            <div class="card row">
                <div class="card-header" id="headingFour">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                             Reward
                        </button>
                    </h5>
                </div>
                <div id="collapseFour" class="collapse" aria-labelledby="headingFour">
                    @foreach ($data['skills'] as $v => $p)
						<div> {{ $v }} {{ $p }} </div>
					@endforeach
                </div>
            </div>
            <div class="card row">
                <div class="card-header" id="headingFive">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                            Skill Requirements
                        </button>
                    </h5>
                </div>
                <div id="collapseFive" class="collapse" aria-labelledby="headingFive">
                    Skill
                </div>
            </div>
            <div class="card row">
                <div class="card-header" id="headingSix">
                    <h5 class="mb-0">
                        <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">
                            Posted By
                        </button>
                    </h5>
                </div>
                <div id="collapseSix" class="collapse" aria-labelledby="headingSix">
                    {{ $data['company_name'] }}
                </div>
            </div>
        </div>
    </div>
    <hr>

    <div class="card row" style="margin-top:20px;">
        <div class="card-header" id="headingOne">
            <h5 class="mb-0">
            <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                Description
            </button>
            </h5>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne">
                {{ $data['description'] }}
        </div>
    </div>
    <div class="row d-flex justify-content-center" style="margin : 10px 0;">
        <a class="btn btn-warning" style="margin-right: 2px;" href="{{$data['document_url']}}" target="_blank">Download</a>
        @can('take', App\Job::class)
            @if(! $data['had_taken'])
            <button class="btn btn-success" style="margin-left: 2px;" data-toggle="modal" data-target="#modal-take">Take</button>
        @endif
        @endcan
    </div>
    <div class="modal" id="modal-take">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Modal Heading</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <h3>Terms and conditons</h3>
            1. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt<br />
            2. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt<br />
            3. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt <br />
            <input type="checkbox" name="vehicle" value="Bike" id="tc-checkbox"
            style="margin-top:10px">I have read and accept the general terms and conditions of business.<br>
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
            <button type="button" class="btn btn-success" id="take-job">take the job</button>
          </div>

        </div>
      </div>
    </div>

@endsection

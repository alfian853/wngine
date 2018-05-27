@extends('layouts.master')

@section('title', 'Job Description')

@section('add-script')
  @parent
  <link rel="stylesheet" href="{{ asset('css/jobdescription.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.3.0/dropzone.css">
  <script src="{{asset('js/jobdetail.js')}}"></script>
  <script src="{{asset('js/dropzone.js')}}"></script>

@endsection

@section('content')
<div class="container">
    <input id="job-id" type="hidden" value="{{$data['id']}}"/>
    <meta name="csrf-token" content="{!! csrf_token() !!}" />
    <div class="col-lg-12" style="margin-top:30px;">
        <div class="row d-flex justify-content-center">
            <div class="h1 col-lg-12" style="font-family:script;;font-weight:bold;text-align:center">{{ $data['job_name'] }}</div>
            <div class="h5 col-lg-12" style="font-family:script;font-style:italic;text-align:center">Posted by : {{$data['company_name']}}</div>
            <div class="h6 col-lg-12" style="font-family:script;font-style:italic;text-align:center">Point : {{ $data['total_point']}}</div>
        </div>

        <hr>
        <div class="card row">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                        Due Date
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" style="padding-left:20px;" class="collapse" aria-labelledby="headingTwo">
                {{ $data['start_date'] }} to {{ $data['due_date'] }}
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
            <div id="collapseFour" style="padding-left:20px;" class="collapse" aria-labelledby="headingFour">
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
            <div id="collapseFive" style="padding-left:20px;" class="collapse" aria-labelledby="headingFive">
                Skill
            </div>
        </div>
        <div class="card row">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link text-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Description
                    </button>
                </h5>
            </div>
            <div id="collapseOne" style="padding-left:20px;" class="collapse" aria-labelledby="headingOne">
                {{ $data['description'] }}
            </div>
        </div>
    <hr>
    <div class="row d-flex justify-content-center" style="margin : 10px 0;">
        <a class="btn btn-warning" style="margin-right: 2px;" href="{{$data['document_url']}}" target="_blank">Download</a>
        @can('take', App\Job::class)
            @if(!$data['had_taken'])
              <button class="btn btn-primary" style="margin-left: 2px;" data-toggle="modal" data-target="#modal-take">Take</button>
            @endif
        @endcan
        {{-- @can('create', App\Job::class) --}}
          <button class="btn btn-danger" style="margin-left: 2px;" data-toggle="modal" data-target="#modal-take">edit</button>
        {{-- @endcan --}}
    </div>
    @can('take', App\Job::class)
        @if($data['had_taken'])
          <section>
            <h5 id="submit-name">File name: <a href="{{$data['file_path']}}">{{$data['file_name']}}</a></h5>
            <h5 id="submit-time">Last submission: {{$data['submit_time']}}</h5><br />
            @if($data['submit_time'] != '')
            @endif

            <div id="dropzone">
              <form class="dropzone needsclick" id="submitJob" action="{{route('member.job.submit',['id' => $data['id'] ]) }}">
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="dz-message needsclick" name="filenya">
                  Drop files here or click here to upload<br>
                </div>
              </form>
            </div>
          </section>
        @endif
    @endcan
    </div>
</div>

<!--RELATED JOBS AREA:::START-->

<!--RELATED JOBS AREA:::END-->


    <div class="modal" id="modal-take">
      <div class="modal-dialog" style="width: 500px">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title" style="">Take Job</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>

          <div class="modal-body">
            <h3>Terms and conditons</h3>
            <ul>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</li>
                <li>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt</li>
            </ul>
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

<script type="text/javascript">
  $(document).ready(function() {

    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    console.log($('meta[name="csrf-token"]').attr('content'));
    $('#take-job').click( function(event) {

        if(document.getElementById('tc-checkbox').checked == true){
            var param = JSON.stringify({"job_id" : $('#job-id').val()});
            $.ajax({
              url: "{{route('post.job.take')}}",
              type: 'POST',
              data: {param},
              success: function (response) {
                 if(response['status'] == 'success'){
                    $("button[data-target='#modal-take']").slideUp();
                    $("#modal-take").hide();
                    $(".modal-backdrop").hide();
                 }
                 alert(response['message']);
              }
            }).fail(function (xhr, error, thrownError) {
                alert('something wrong :(');
            });

        }
        else{
            alert('please agree the terms and conditions');
        }

    });


});
</script>
@endsection

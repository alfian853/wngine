@extends('layouts.master')

@section('title', 'Detail Project')

@section('add-script')
  @parent
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('js/job_admin.js') }}"></script>
  <script src="{{ asset('js/finished_project.js') }}"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
  <style>
    #sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }
    #sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }
    #sortable li span { position: absolute; margin-left: -1.3em; }
    p{
      width: 200px !important;
      white-space: nowrap !important;
      overflow: hidden !important;
      text-overflow:ellipsis !important;
    }
    td,th{
      text-align: center;
    }
  </style>

  <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
@endsection

@section('content')
  <h1>finished</h1>
  @php $total=0; @endphp
  @foreach ($skills as $skill)
    {{-- @php $total+=$skill->point;@endphp --}}
    {{$skill->name}} : {{$skill->point}}
  @endforeach
  <h1>total point: {{$total}}</h1>
<div class="container-fluid">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="job-id" content="{{$job_id}}">
  <div class="col-lg-12" style="height:auto">
    <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;font-size:60px;font-weight:bold">Detail Project</h1>
  </div>
  <div id="project-list" class="container row" style="margin : auto;">
    <div class="col-md-11">
      <table id="rank-table" class="table table-condensed" style="min-height: 25px;height: 25px;">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>status</th>
            <th>Last submit date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="sortable">
          @php $i = 1; @endphp
          @foreach($lists as $list)
          <tr>
            <span>
              <td height="50">{{$i++}}</td>
              <td height="50"><a href="{{route('member.profilebyid',['id' => $list->m_id])}}">{{$list->m_name}}</a></td>
              <td height="50">{{$list->email}}</td>
              <td height="50" value="{{$list->email}}"
                data-toggle="modal" data-target="#modal-comment" style="cursor:pointer;" onclick="editComment('{{$list->email}}')">
                <p>{{$list->status}}{{$list->comment}}</p>
              </td>
              <td height="50" style="width:200px">
                  @switch ($list->status)
                    @case(0)
                      <p class="text-danger">Not submit yet</p>
                      @break
                    @case(1)
                      <p class="text-primary">Viewed</p>
                      @break
                    @case(2)
                      <p value="{{$list->email}}" class="text-warning" >Submission updated</p>
                      @break
                    @case(3)
                      <p value="{{$list->email}}" class="text-success" >Not viewed yet</p>
                      @break
                  @endswitch
              </td>
              <td height="50">{{$list->last_submit_time}}</td>
              <td height="50">
                @switch ($list->status)
                  @case(0)
                    <a href="" class="btn btn-danger disabled btn-sm" target="_blank">download</a>
                    @break
                  @case(1)
                    <a href="{{asset('job_submissions')}}/{{$list->submission_path}}" class="btn btn-primary btn-sm" target="_blank">download</a>
                    @break
                  @case(2)
                    <a style="color:white;" value="{{$list->email}}" class="btn btn-warning btn-sm" onclick="getDownloadUrl('{{$list->email}}')">download</a>
                    @break
                  @case(3)
                    <a style="color:white;" value="{{$list->email}}" class="btn btn-success btn-sm" onclick="getDownloadUrl('{{$list->email}}')">download</a>
                    @break
                @endswitch
                <a style="color:white;background-color:rgb(255, 114, 0)"
                value="{{$list->email}}" class="btn btn-sm" onclick="setId('{{$list->m_id}}')"
                data-toggle="modal" data-target="#modal-pay">Pay</a>
              </td>
            </span>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="modal" id="modal-comment">
    <div class="modal-dialog" style="width: 500px">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title" style="">Comment for</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <textarea id="edit-comment" style="width:100%"></textarea>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
          <button type="button" class="btn btn-success" id="save-comment" value="">Save</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal-pay">
    <div class="modal-dialog" style="width: 500px">
      <form action="{{route('company.job.pay',['id' => $job_id])}}" method="post" class="modal-content">
        {{csrf_field()}}
        <!-- Modal Header -->
        <input type="hidden" name="data_send" value="ini json"/>
        <div class="modal-header">
          <h4 class="modal-title" style="">Pay</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <div class="col-sm-12">
              <div class="row d-flex justify-content-center">
                <div class="col-sm-5">
                  <div class="col-sm-12">
                    <p>Skill</p>
                  </div>
                  <div class="col-sm-12">
                    <select id="input-skill" type="text" style="width:100%;text-align:center" placeholder="skill" class="js-example-basic-single d-flex justify-content-center">
                      @foreach($skills as $skill)
                        <option value="{{ $skill->id }}" max="{{$skill->point}}"> {{ $skill->name }} </option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="col-sm-12">
                    <p>Point</p>
                  </div>
                  <div class="col-sm-12">
                    <input id="input-point" style="width:70px" type="number" name="point" placeholder="Point" value="50" class="form-control"/>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="col-sm-12">
                    <p>Action</p>
                  </div>
                  <div class="col-sm-12">
                    <input type="button" id="add-skill" value="add"/>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-12" id="skill-list">
            </div>
          </div>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
          <h6 id="pay-sum" style="float:left">Total pay : 0 point</h6>
          <button type="button" class="btn btn-danger" data-dismiss="modal">close</button>
          <button type="submit" class="btn btn-success" id="submit-pay" value="">Pay</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@extends('layouts.master')

@section('title', 'Detail Project')

@section('add-script')
  @parent
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('js/job_admin.js') }}"></script>
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
<div class="container-fluid">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="job-id" content="{{$job_id}}">
  <div class="col-lg-12" style="height:auto">
    <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;font-size:60px;font-weight:bold">Detail Project</h1>
    <button id="submit-change" type="button" class="btn btn-success" id="take-job">submit change</button>
  </div>
  <div id="project-list" class="container row" style="margin : auto;">
    <div class="col-md-11">
      <table id="rank-table" class="table table-condensed" style="min-height: 25px;height: 25px;">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
            <th>Last submit date</th>
            <th>Comment</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody id="sortable">
          @php $i = 1; @endphp
          @foreach($lists as $list)
          <tr>
            <span>
              <td height="50">{{$i++}}</td>
              <td height="50"><a href="">{{$list->m_name}}</a></td>
              <td height="50">{{$list->email}}</td>
              <td height="50">{{$list->m_telp}}</td>
              <td height="50" value="{{$list->email}}" data-toggle="modal" data-target="#modal-comment" onclick="editComment('{{$list->email}}')">
                <p>{{$list->comment}}</p>
              </td>
              <!-- <td><img src="{{URL::to($list->m_image)}}" style="width: 100%"></td> -->
              <td height="50">
                <a href="{{route('member.profilebyid',['id' => $list->m_id])}}" class="btn btn-danger btn-sm" target="_blank">View profile</a>
                <a class="btn btn-warning btn-sm">View profile</a>
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




</div>

@endsection

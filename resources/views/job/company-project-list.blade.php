@extends('layouts.master')

@section('title', 'Project List')

@section('add-script')
  @parent
  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>

@endsection

@section('content')
<div class="container-fluid">

  <div class="col-lg-12" style="height:auto">
    <h1 style="text-align:center;margin-top:30px;margin-bottom:30px;font-size:60px;font-weight:bold">Project List</h1>
    <div class="d-flex justify-content-center">
      <a href="{{route('job.postingJob')}}" target="_blank" style="color:green;font-size:25px;" class="fa fa-plus-square-o">Add project</a>
    </div>
  </div>
  <div class="" style="padding: 5%">
    <table id="project-list" class="table table-condensed">
      <thead>
        <tr>
          <th>Name</th>
          <th>Description</th>
          <th>Upload Date</th>
          <th>Finish Date</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach($jobs as $job)
          @if($job->isFinish)
            <tr style="background: rgba(9, 182, 0, 0.58);">
          @else
            <tr>
          @endif
          <td>{{$job->name}}</td>
          <td>{{$job->description}}</td>
          <td>{{$job->upload_date}}</td>
          <td>{{$job->finish_date}}</td>
          <td class="container" style="max-width: 10%;white-space: nowrap">
            <a style="white-space: nowrap" href="{{route('job.detail',['id' => $job->id])}}" class="btn btn-primary">Detail</a>
            <a style="white-space: nowrap" href="{{route('company.job.detail',['id' => $job->id])}}" class="btn btn-success">Manage</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>







</div>
<script>
$('#project-list').DataTable({
  'order' : [[3,'desc']]
});


</script>
@endsection

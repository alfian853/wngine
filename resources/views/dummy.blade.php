@extends('layouts.master')

@section('title', 'dummy')

@section('add-script')
  @parent
  <script src="{{ asset('js/workerlist.js') }}"></script>
  <link rel="stylesheet" href="{{ asset('css/workerlist.css') }}">
@endsection

@section('content')
<ul id="worker-list">
  <li class="ui-state-default"><span style="color:red" class="fa fa-trash"></span>Item 1</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 2</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 3</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 4</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 5</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 6</li>
  <li class="ui-state-default"><span class="ui-icon ui-icon-arrowthick-2-n-s"></span>Item 7</li>
</ul>

@endsection

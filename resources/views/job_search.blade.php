@extends('layouts.master')

@section('title', 'Home')

@section('add-script')
  @parent
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet"/>
@endsection


@section('content')
<form class="form-wrapper cf">
  <input type="text" placeholder="Search here..." required>
  <button type="submit">Search</button>
</form>
<div class="byline"><p>search box by <a href="http://speckyboy.com/2012/02/15/how-to-build-a-stylish-css3-search-box/">SpeckyBoy</a> featured on <a href="http://thecodeblock.com/search-box-tutorials-using-css3-jquery/">THE CODE BLOCK</a></p></div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"/></script>
<script src="{{ asset('js/home.js') }}"></script>
@endsection

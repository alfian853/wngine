@extends('layouts.master')

@section('title', 'Members')

@section('add-script')
  @parent
  <link rel="stylesheet" href="css/home.css">
@endsection


@section('header')
<header>
  @if(!empty(Session::get('login')))
    @include('template.header_login')
  @else
    @include('template.header')
  @endif
</header>
@endsection


@section('content')
Members



@endsection
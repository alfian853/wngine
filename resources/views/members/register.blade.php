@extends('layouts.master')

@section('title', 'Home')

@section('add-css')
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
<form action="/members" method="post">
{{ csrf_field() }}
<input type="text" name="name" placeholder="nama">
<input type="text" name="password" placeholder="password">
<input type="text" name="email" placeholder="email">
<input type="text" name="address" placeholder="address">
<input type="text" name="telp" placeholder="telp"> 
<input type="text" name="tgllahir" placeholder="tgllahir">
<input type="submit" value="Register">
</form>



@endsection

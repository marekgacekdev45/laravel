@extends('layout.master')
@section('title','HomePage')


@section('content')
   <main class="homepage">
    @include('pages.components.home.header')

    @auth
    <form action="{{route('logout')}}" method="post">
      @csrf
   <button class="btn btn-primary">Logout</button></form>
   @endauth
   </main>
@endsection
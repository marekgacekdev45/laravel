@extends('layout.master')
@section('title','cart')
@section('content')
<div class="accounts-page">
    <div class="container">
        @auth
        <form action="{{route('logout')}}" method="post">
          @csrf
       <button class="btn btn-primary">Logout</button></form>
       @endauth
    </div>
</div>
@endsection
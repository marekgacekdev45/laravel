@extends('layout.master')
@section('title','Register')
@section('content')
   <section class="login-page">
   <div class="login-form-box">
      <div class="login-title">Register</div>
      <div class="login-form">
         <form action="{{route('register')}}" method="post">
            @csrf
            <div class="field">
               <label for="name">Name</label>
               <input type="text" name="name" id="name" placeholder="John Doe" class="@error('name') has-error @enderror">
               @error('name')
<span class="field-error">{{$message}}</span>
               @enderror
            </div>
            <div class="field">
               <label for="email">Email</label>
               <input type="email" name="email" id="email" placeholder="email@email.com" class="@error('email') has-error @enderror">
               @error('email')
               <span class="field-error">{{$message}}</span>
                              @enderror
            </div>
            <div class="field">
               <label for="password">Password</label>
               <input type="password" name="password" id="password" placeholder="******" class="@error('password') has-error @enderror">
               @error('password')
               <span class="field-error">{{$message}}</span>
                              @enderror
            </div>
            <div class="field">
               <label for="password_confirmation">Confirm password</label>
               <input type="password" name="password_confirmation" id="password_confirmation" placeholder="******"
               class="@error('password_confirmation') has-error @enderror">
               @error('password_confirmation')
               <span class="field-error">{{$message}}</span>
                              @enderror
            </div>
            <div class="field">
               <button type="submit" class="btn btn-primary btn-block">Register</button>
            </div>



         </form>
      </div>
   </div>
</section>
@endsection
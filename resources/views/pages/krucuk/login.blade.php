@extends('layouts.krucuk')
@section('content')
<div class="container">
     <div class="row">
     <div class="col-md-7 p-5">
          <img src="assets/img/hero-icon.png" width="100%" class="align-self-center">
     </div>
     <div class="col-md-5">
          <div class="card col p-4 align-self-center">
               <form action="{{route('login')}}" method="POST">  
                    @csrf
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email address</label>
                      <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      @error('email')
                      <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                      @error('password')
                         <small id="emailHelp" class="form-text text-muted">{{$message}}</small>
                      @enderror
                    </div>
                    <div class="form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">
                         I agree to krucuk Terms of Service, Privacy Policy and Content Policies</label>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3">Login</button>
               </form>
          </div>
          {{-- <div class="col-12 text-center mt-3">
               <p class="text-muted">Login as partner? <a href="{{route('login-merchant')}}" class="text-muted ml-1"><b>Login</b></a></p>
           </div> --}}
     </div>
</div>
</div>
@endsection
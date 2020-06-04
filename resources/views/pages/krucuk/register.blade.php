@extends('layouts.krucuk')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 p-5">
            <img src="assets/img/hero-icon.png" width="100%" class="align-self-center">
        </div>
        <div class="col-md-5">
            <div class="card col p-4 align-self-center">
                <form action="{{url('register/create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" aria-describedby="emailHelp" value="{{old('name')}}" placeholder="Enter name">
                        @error('name')
                        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}">
                        @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                        @error('password')
                        <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary mt-3">Submit</button>
                </form>
            </div>
            <div class="col-12 text-center mt-3">
                <p class="text-muted">Want to be our partner? <a href="{{route('register-merchant')}}" class="text-muted ml-1"><b>Register</b></a></p>
            </div>
        </div>
    </div>
</div>
@endsection

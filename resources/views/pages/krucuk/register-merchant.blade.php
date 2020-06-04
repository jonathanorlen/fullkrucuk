@extends('layouts.krucuk')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-7 p-5">
            <img src="assets/img/hero-icon.png" width="100%" class="align-self-center">
        </div>
        <div class="col-md-5">
            <div class="card col p-4 align-self-center">
                <h2 class="mb-4">
                    Partner With Us
                </h2>
                <form action="{{route('register-merchant-create')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name Bussines</label>
                        <input type="text" name="place" class="form-control" id="place" value="{{old('place')}}" placeholder="Enter Name Bussines">
                        @error('place')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bisnis address</label>
                        <input type="text" name="address" class="form-control" id="exampleInputEmail1" value="{{old('address')}}" placeholder="Enter Address">
                        @error('address')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{old('name')}}" placeholder="Enter Name">
                        @error('name')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" value="{{old('email')}}" placeholder="Enter email">
                        @error('email')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Phone</label>
                        <input type="number" name="phone" class="form-control" id="exampleInputPassword1" value="{{old('phone')}}" placeholder="Enter phone">
                        @error('phone')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" value="{{old('password')}}" placeholder="Password">
                        @error('password')
                            <small id="emailHelp" class="form-text text-danger">{{$message}}</small>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-block btn-lg btn-primary mt-4">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

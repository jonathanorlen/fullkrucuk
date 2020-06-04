@extends('layouts.admin')

@section('title','Kategori Form')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>User Forms</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">User</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                         <form action="{{route('user.update',$item->id)}}" method="POST">
                            @php
                                if($form =='edit'){
                                    echo method_field('PUT');
                                }
                            @endphp
                            @csrf
                        <div class="card-body row">
                            <div class="form-group col-md-6 col-12">
                                <label>Nama</label>
                                <input type="text" name="name" id="name" class="form-control" value="{{isset($item->name)?$item->name:old('name')}}" readonly>
                                @error('name')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Email</label>
                                <input type="email" name="email" id="email" class="form-control" value="{{isset($item->email)?$item->email:old('email')}}" readonly>
                                @error('email')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Phone</label>
                                <input type="phone" name="phone" id="phone" class="form-control" value="{{isset($item->phone)?$item->phone:old('phone')}}" readonly>
                                @error('phone')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Birth Date</label>
                                <input type="date" name="birth_date" id="birth_date" class="form-control" value="{{isset($item->birth_date)?$item->birth_date:old('birth_date')}}" readonly>
                                @error('birth_date')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label>Address</label>
                                <textarea name="address" id="" rows="10" class="form-control" readonly> {{isset($item->address)?$item->address:old('address')}}</textarea>
                                @error('address')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group col-md-6 col-12">
                                <label class="d-block">Status</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status1" value="1" {{isset($item->status)?($item->status == '1')?'checked="checked"':'':old('title')}}>
                                    <label class="form-check-label" for="status1">
                                        On
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="status" id="status2" value="0" {{isset($item->status)?($item->status == '0')?'checked="checked"':'':old('title')}}>
                                    <label class="form-check-label" for="status2">
                                        Off
                                    </label>
                                </div>
                                @error('status')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="card-footer text-right">
                                <button type="submit" class="btn btn-primary pull-right">Submit</button>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection

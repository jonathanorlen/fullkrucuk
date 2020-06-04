@extends('layouts.admin')

@section('title','Kategori Form')

@section('content')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Banner Forms</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Category</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="card">
                         <form action="{{($form=='create')?route('banner.store'):route('banner.update',$item->id)}}" method="POST" enctype="multipart/form-data">
                            @php
                                if($form =='edit'){
                                    echo method_field('PUT');
                                }
                            @endphp
                            @csrf
                        <div class="card-body">
                            <div class="form-group">
                                @if (isset($item) && $item->image)
                                    <img src="{{Storage::url('public/banners'.$item->image)}}" width="200px" alt="">
                                @endif
                                <br>
                                <label>Banner</label>
                                <input type="file" name="image" id="title" class="form-control">
                                <input type="hidden" name="image_lama" value="{{isset($item->image)?$item->image:''}}">
                                @error('image')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" id="title" class="form-control" value="{{isset($item->title)?$item->title:old('title')}}">
                                @error('title')
                                    <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
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
                                <button type="submit" class="btn btn-primary">Submit</button>
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

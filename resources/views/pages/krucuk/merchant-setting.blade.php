@extends('layouts.krucuk')
@push('post-style')
    <style>
        .upload-btn-wrapper {
   position: relative;
   overflow: hidden;
   display: inline-block;
   width:100%;
 }
 
 .upload-btn-wrapper input[type=file] {
   font-size: 100px;
   position: absolute;
   left: 0;
   top: 0;
   opacity: 0;
 }
    </style>
@endpush
@section('content')
<div class="container">
    @if ($merchant->status == 0)
        @include('pages.krucuk.TheAlert')
    @endif
    <form action="{{route('merchant-setting-update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            @include('pages.krucuk.merchant-navbar')
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h3>Setting</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Banner</label>
                            <div class="image-35" id="imagepreview" style="background-image: url('{{Storage::url('cover/'.$merchant['cover'])}}');">
                            </div>
                            <div class="upload-btn-wrapper mt-1">
                                <button class="btn-danger btn"
                                    style="background-color: #234c6f !important;border:0px">Upload</button>
                                <input type="file" name="cover" id="imageUpload" accept=".png, .jpg, .jpeg" />
                                <input type="hidden" name="cover_lama"
                                    value="{{(isset($data['cover']))?$data['cover']:''}}" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Place</label>
                            <input type="text" class="form-control" name="place" value="{{$merchant->place}}">
                        </div>
                        <div class="form-group">
                            <label for="">Range Harga</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="min_price" placeholder="Harga Minimum" value="{{$price[0]}}">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="max_price" placeholder="Harga Maksimum" value="{{$price[1]}}">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Category</label>
                            <select name="category" class="form-control">
                                <option value="">- Select Your Category -</option>
                                @foreach ($category as $item)
                                <option value="{{$item->id}}">{{$item->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Address</label>
                            <input type="text" name="address" class="form-control" value="{{$merchant->address}}">
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control" value="{{$merchant->email}}">
                        </div>
                        <div class="form-group">
                            <label for="">Phone</label>
                            <input type="number" name="phone" class="form-control" value="{{$merchant->phone}}">
                        </div>
                        <div class="form-group">
                            <label for="">Instagram</label>
                            <input type="text" name="instagram" class="form-control" value="{{$merchant->instagram}}">
                        </div>
                        <div class="form-group">
                            <label for="">Twitter</label>
                            <input type="text" name="twitter" class="form-control" value="{{$merchant->twitter}}">
                        </div>
                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input type="text" name="facebook" class="form-control" value="{{$merchant->facebook}}">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-success pull-right">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('post-script')
    <script>
        function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      console.log(reader)
      reader.onload = function(e) {
        $('#imagepreview').css('background-image', 'url('+e.target.result +')');
      }
      reader.readAsDataURL(input.files[0]);
    }
  }
  $("#imageUpload").change(function() {
    readURL(this);
  });
    </script>
@endpush

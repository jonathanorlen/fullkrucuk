@extends('layouts.krucuk')
@push('post-style')
<style>
    .file-upload {
        background-color: #ffffff;
        width: 600px;
        margin: 0 auto;
        padding: 20px;
    }

    .file-upload-content {
        display: none;
        text-align: center;
    }

    .file-upload-input {
        position: absolute;
        margin: 0;
        padding: 0;
        width: 100%;
        height: 100%;
        outline: none;
        opacity: 0;
        cursor: pointer;
    }

    .square {
        width: 100%;
        padding-top: 60%;
        /* 1:1 Aspect Ratio */
        position: relative;
    }

    .image-upload-wrap {
        border: 4px dashed #1FB264;
    }

    .image-dropping,
    .image-upload-wrap:hover {
        background-color: #1FB264;
        border: 4px dashed #ffffff;
    }

    .image-title-wrap {
        padding: 0 15px 15px 15px;
        color: #222;
    }

    .drag-text {
        text-align: center;
    }

    .drag-text h3 {
        font-weight: 100;
        text-transform: uppercase;
        color: #15824B;
        padding: 60px 0;
    }

    .file-upload-image {
        max-height: 200px;
        max-width: 200px;
        margin: auto;
        padding: 20px;
    }

    .remove-image {
        width: 200px;
        margin: 0;
        color: #fff;
        background: #cd4535;
        border: none;
        padding: 10px;
        border-radius: 4px;
        border-bottom: 4px solid #b02818;
        transition: all .2s ease;
        outline: none;
        text-transform: uppercase;
        font-weight: 700;
    }

    .remove-image:hover {
        background: #c13b2a;
        color: #ffffff;
        transition: all .2s ease;
        cursor: pointer;
    }

    .remove-image:active {
        border: 0;
        transition: all .2s ease;
    }

</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        @include('pages.krucuk.merchant-navbar')
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Menu</h3>
                </div>
                <div class="card-body">
                    <form action="{{route('merchant-menu-update')}}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="gambar1">Gambar</label>
                            <input type="file" name="menu" class="form-control">
                            <input type="hidden" name="menu_lama" class="form-control" value="{{$merchant->menu}}">
                        </div>
                        @if ($merchant->menu)
                        <img src="{{Storage::url('galleries/'.$merchant->menu)}}" width="100%" alt="">
                        @endif
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


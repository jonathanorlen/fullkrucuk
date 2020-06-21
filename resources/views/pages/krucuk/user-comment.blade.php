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
        @include('pages.krucuk.user-navbar')
        <div class="col-md-8">
            <div class="row">
                @forelse ($comments as $comment)
                <div class="col-md-6 pb-2 pl-2 pr-2">
                    <div class="card">
                        <div class="card-body">
                        {{$comment->merchant->place}}
                        <hr>
                            @for ($i = 0; $i < $comment->rating; $i++)
                                <i class="fa fa-star"></i>
                            @endfor
                        <br>
                        {{$comment->review}}
                        </div>
                    </div>
                </div>
                @empty
                    <h1>Data Empty</h1>
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection


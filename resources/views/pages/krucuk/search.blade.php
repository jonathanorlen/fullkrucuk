@extends('layouts.krucuk')
@section('title','Search')
@push('post-style')
<style>
    .price {
        color: #F96240;
        font-size: 16px;
    }

    .fa-star {
        color: #FFBF23;
    }

</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-3 col-lg-3 col-sm-12 col-12">
            <div class="row">
                <div class="col col-md-6 col-lg-6 col-sm-12 col-12">
                    <div class="aside font-kanan"><b>Filter</b></div><br>
                </div>
                <div class="col col-md-6 col-lg-6 col-sm-12 col-12 text-right">
                    <div class="aside font-kanan">clear filter</div><br>
                </div>
            </div>

            <form action="{{route('search')}}" method="GET">
                <input type="hidden" name="search" value="{{Request::get('search')}}">
                <div class="row">
                    <div class="col-md-6 p-1">
                        <div class="form-group text-center">
                            <label for="Minimum">Minimum</label>
                            <input type="text" name="minimum" class="form-control" placeholder="Minimum" id="Minimum">
                        </div>
                    </div>
                    <div class="col-md-6 p-1 text-center">
                        <div class="form-group">
                            <label for="Maximum">Maxsimum</label>
                            <input type="text" name="maximum" class="form-control" placeholder="Maksimum" id="Maksimum">
                        </div>
                    </div>
                </div>
                <br>
                <div><b>Rating</b></div>
                <div class="row">
                    <div class="col-md-12">
                        <input type="checkbox" name="rating"> <i class="fas fa-star"></i>
                    </div>
                    <div class="col-md-12">
                        <input type="checkbox" name="rating"> <i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <div class="col-md-12">
                        <input type="checkbox" name="rating"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i>
                    </div>
                    <div class="col-md-12">
                        <input type="checkbox" name="rating"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <div class="col-md-12">
                        <input type="checkbox" name="rating"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i
                            class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                </div>
                <br>
                <div><b>Category</b></div>
                <div class="row">
                    @foreach ($categories as $item)
                    <div class="col-md-12">
                        <input type="radio" name="category" value="{{$item->slug}}"> {{$item->title}}
                    </div>
                    @endforeach
                </div>
                <br>
                <center>
                    <button class="btn btn-block btn-success" type="submit">Filter</button>
                </center>
            </form>
        </div>
        <div class="col-md-9 row">
            @forelse ($merchants as $merchant)
            <a href="{{route('detail',$merchant->id)}}" class="col-md-4 card-content">
                <div class="card-image" style="background-image: url({{Storage::url('cover/'.$merchant->cover)}})">
                </div>
                <div class="card-tit">{{$merchant->place}}</div>
                <div class="card-place">{{$merchant->address}}</div>
                <div class="card-detail-category">
                    {{isset($merchant->category->title)?$merchant->category->title:''}}</div>
                <div class="price">Rp. 25.000-100.000</div>
            </a>
            @empty
            <h2>Restoran Tidak Ada</h2>
            @endforelse
        </div>
    </div>
    </main>
    @endsection

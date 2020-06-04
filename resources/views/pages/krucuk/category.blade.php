@extends('layouts.krucuk')
@section('title','Category')
@push('post-style')
<style>
    .price {
        color: #F96240;
        font-size: 16px;
    }
    .fa-star{
          color: #FFBF23;
        }
</style>
@endpush
@section('content')
<div class="container">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">{{$category->title}}</h1>
        </div>
    </div>

    <div clas="container">
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

                <form>
                    <div class="row">
                        <div class="col-md-6 p-1">
                            <div class="form-group text-center">
                                <label for="Minimum">Minimum</label>
                                <input type="text" name="" class="form-control" placeholder="Minimum" id="Minimum">
                            </div>
                        </div>
                        <div class="col-md-6 p-1 text-center">
                            <div class="form-group">
                                <label for="Maximum">Maksimum</label>
                                <input type="text" name="" class="form-control" placeholder="Maksimum" id="Maksimum">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div><b>Rating</b></div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox" name="options"> <i class="fas fa-star"></i>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="options"> <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="options"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="options"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="options"> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                    </div>
                    <br>
                    <center>
                        <button class="btn btn-block btn-success" type="submit">Sumbit</button>
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
                    <div class="price">Rp. 25.000-100.000</div>
                </a>
                @empty
                <h2>Data EMpty</h2>
                @endforelse
            </div>
        </div>
    </div>
    </main>
    @endsection

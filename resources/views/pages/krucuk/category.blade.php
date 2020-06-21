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
    <div class="jumbotron jumbotron-fluid" style="background-image: url({{Storage::url('public/cover/'.$category->cover)}})">
        <div class="container">
            <h1 class="display-4" style="font-weight: bold;color: white; background-size: cover">{{$category->title}}</h1>
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

                <form action="{{route('category',Request::segment(2))}}" method="GET">
                    <div class="row">
                        <div class="col-md-6 p-1">
                            <div class="form-group text-center">
                                <label for="Minimum">Minimum</label>
                                <input type="text" name="minimun" class="form-control" placeholder="Minimum" id="Minimum">
                            </div>
                        </div>
                        <div class="col-md-6 p-1 text-center">
                            <div class="form-group">
                                <label for="Maximum">Maksimum</label>
                                <input type="text" name="maksimum" class="form-control" placeholder="Maksimum" id="Maksimum">
                            </div>
                        </div>
                    </div>
                    <br>
                    <div><b>Rating</b></div>
                    <div class="row">
                        <div class="col-md-12">
                            <input type="checkbox" name="rating[]" value="1" {{(Request::get('rating'))?(in_array(1,Request::get('rating')))?'checked':'':''}}> <i class="fas fa-star"></i>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="rating[]" value="2" {{(Request::get('rating'))?(in_array(2,Request::get('rating')))?'checked':'':''}}> <i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="rating[]" value="3" {{(Request::get('rating'))?(in_array(3,Request::get('rating')))?'checked':'':''}}> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="rating[]" value="4" {{(Request::get('rating'))?(in_array(4,Request::get('rating')))?'checked':'':''}}> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                        </div>
                        <div class="col-md-12">
                            <input type="checkbox" name="rating[]" value="5" {{(Request::get('rating'))?(in_array(5,Request::get('rating')))?'checked':'':''}}> <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
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
                    <div class="card-image" style="background-image: url({{Storage::url('cover/'.$merchant->cover)}})"></div>
                    <div class="card-tit">{{$merchant->place}}</div>
                    <div class="card-place">{{$merchant->address}}</div>
                    <div class="card-place">
                        @for ($i = 0; $i < $merchant->rating; $i++)
                            <i class="fas fa-star"></i>
                        @endfor
                    </div>
                    <div class="price">Rp. {{$merchant->price}}</div>
                </a>
                @empty
                <h2>Data EMpty</h2>
                @endforelse
            </div>
        </div>
    </div>
    </main>
    @endsection

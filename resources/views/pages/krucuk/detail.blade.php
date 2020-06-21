@extends('layouts.krucuk')
@section('title','Welcome')
@push('post-style')
<style>
    fieldset,
    label {
        margin: 0;
        padding: 0;
    }

    h1 {
        font-size: 1.5em;
        margin: 10px;
    }

    /****** Style Star Rating Widget *****/

    .rating {
        border: none;
        float: left;
        font-size: 25px !important;
    }

    .rating>input {
        display: none;
    }

    .rating>label:before {
        margin: 5px;
        font-size: 1.25em;
        font-family: FontAwesome;
        display: inline-block;
        content: "\f005";
    }

    .rating>.half:before {
        content: "\f089";
        position: absolute;
    }

    .rating>label {
        color: #ddd;
        float: right;
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating>input:checked~label,
    /* show gold star when clicked */
    .rating:not(:checked)>label:hover,
    /* hover current star */
    .rating:not(:checked)>label:hover~label {
        color: #FFD700;
    }

    /* hover previous stars in list */

    .rating>input:checked+label:hover,
    /* hover current star when changing rating */
    .rating>input:checked~label:hover,
    .rating>label:hover~input:checked~label,
    /* lighten current selection */
    .rating>input:checked~label:hover~label {
        color: #FFED85;
    }

    .opening {
        font-size: 24px;
        font-weight: bold;
        color: #37F9C2;
        margin-bottom: 2rem
    }

    .banner {
        background-size: cover;
        width: 100%;
        padding-top: 50%;
        position: relative;
        position: relative;
    }

    .time {
        font-size: 16px;
    }

    .title {
        font-size: 3rem;
        font-weight: bold;
        color: #0F0F0F;
    }

    .address {
        font-size: 1.25rem;
        color: #A0A3A6;
        margin-bottom: 4px;
    }

    .range {
        font-size: 20px;
        margin-top: 4px;
        margin-bottom: 4px;
    }

    .price {
        font-size: 1.75rem;
        font-weight: bold;
        margin-bottom: 4px;
        color: #F95A37;
    }

    .rasio {
        width: 100%;
        padding-top: 100%;
        position: relative;
        background-size: cover;

    }

    .rasio1 {
        width: 100%;
        padding-top: 30%;
        position: relative;
        background-size: cover;

    }

    .rasio2 {
        width: 100%;
        padding-top: 80%;
        position: relative;
        background-size: contain;

    }

    .menu {
        margin-top: 12px;
        font-size: 28px;
        font-weight: bold;
    }

    .review {
        font-size: 28px;
        text-align: center;
        margin-top: 4px;
        margin-left: 16px;
        margin-bottom: 8px;
    }

    .rating {
        font-size: 60px;
        text-align: center;
        margin-top: 4px;
        margin-bottom: 8px;
    }

    .view {
        font-size: 16px;
        text-align: center;
        margin-top: 4px;
        margin-bottom: 8px;
    }

    .rating_bar {
        font-size: 12px;
        margin-right: 16px;
    }

    .add {
        font-size: 16px;
        padding-top: 4px;
        padding-left: 4px;
        padding-right: 4px;

    }

    .moreinfo {
        font-size: 24px;
        font-weight: bold;
        margin-top: 4px;
        margin-left: 12px;
        margin-bottom: 4px;
    }

    .card-body li {
        margin-left: 12px;
        margin-top: 4px;
    }

    .profile {
        font-size: 12px;
        margin-top: 4px;
        margin-bottom: 8px;
        text-align: center;
    }

    .total {
        font-size: 16px;
        margin-bottom: 8px;
        margin-top: 8px;
    }

    .tombol {
        background-color: #F96240;
    }

    .lainlain {
        color: white;
        background-color: #F96240;
    }

    .comment {
        padding-top: 2%;
        font-size: 20px;
        margin-bottom: 4px;
        margin-top: 4px;
        margin-left: 12px;
    }
    .fa-star{
        color: #FFBF23;
    }
    .float{
	position:fixed;
	width:60px;
	height:60px;
	bottom:20px;
	right:20px;
	background-color:#F95A37;
	color:#FFF;
	border-radius:50px;
	text-align:center;
	box-shadow: 2px 2px 3px #999;
    }

    .my-float{
	    margin-top:22px;
    }
</style>
@endpush
@section('content')
<div class="container">
    <div class="row">
        <div class="col col-md-12 col-sm-12">
            <div class="card-image rasio1"
                style="background-image: url({{Storage::url('cover/'.$merchant->cover)}});padding-top:30%">
                <button class="btn btn-warning" style="position: relative; top: 10">+ Add</button>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-md-8">
            <span class="title">{{$merchant->place}}</span>
            <p class="address">{{$merchant->address}}</p>
            @for ($i = 0; $i < $total_rate; $i++)
                <i class="fas fa-star"></i>
            @endfor
            <span>{{$total_rate}} / 5</span>
            <p class="range mt-5">Range Harga : </p>
            <p class="price">Rp {{$merchant->price}}</p>
            <div class="col-md-12">
                <div class="row">
                    @foreach ($galleries as $gallery)
                    <div class="col-md-2 p-0 mr-2">
                        <div class="card-image rasio"
                            style="background-image: url({{Storage::url('galleries/'.$gallery->image   )}});"></div>
                    </div>
                    @endforeach
                </div>
            </div>
            <p class="menu">Menu : </p>
            <div class="col col-md-12 p-0 mb-4">
                <div class="rasio1" style="background-image: url({{Storage::url('galleries/'.$merchant->menu)}});"
                    style="padding-top: 30%;"></div>
            </div>

            {{-- <div class="row">
                <div class="col-5 col-lg-3">
                    <p class="review">Review</p>
                    <p class="rating">4.5</p>
                    <p class="view">100 Views</p>
                </div>
                <div class="col-7 col-lg-7">
                    <p>
                        5
                        <div class="progress">
                            <div class="progress-bar" style="width:70%"></div>
                        </div>
                    </p>
                </div>
            </div> --}}
            <br>
            @if(!$cek_review)
            <form action="{{route('rate')}}" method="POST">
                @csrf
                <h1>Rate This Restaurant</h1>
                <fieldset class="rating">
                    <input type="radio" id="star5" name="rating" value="5" required /><label class="full" for="star5"
                        title="Awesome - 5 stars"></label>
                    <input type="radio" id="star4" name="rating" value="4" required /><label class="full" for="star4"
                        title="Pretty good - 4 stars"></label>
                    <input type="radio" id="star3" name="rating" value="3" required /><label class="full" for="star3"
                        title="Meh - 3 stars"></label>
                    <input type="radio" id="star2" name="rating" value="2" required /><label class="full" for="star2"
                        title="Kinda bad - 2 stars"></label>
                    <input type="radio" id="star1" name="rating" value="1" required /><label class="full" for="star1"
                        title="Sucks big time - 1 star"></label>
                </fieldset>
                <input type="hidden" name="merchant_id" value="{{$merchant->id}}">
                <div class="form-group">
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="review" rows="6"
                        required></textarea>
                </div>
                <button class="btn tombol rounded float-right" type="submit">
                    <span class="add">Add Review</span>
                </button>
            </form>
            @else
            <div class="row">
                <h1>Your Review</h1>
                <div class="col-md-12">
                    <p class="name">{{$cek_review->name}} | {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $cek_review->created_at)->format('Y-m-d')}}</p>
                    <p>
                    <fieldset class="rating">
                        <input type="radio" id="star5" name="rating" value="5" {{($cek_review->rating == 5)?'checked':''}} disabled/><label class="full" for="star5"
                            title="Awesome - 5 stars"></label>
                        <input type="radio" id="star4" name="rating" value="4" {{($cek_review->rating == 4)?'checked':''}} disabled /><label class="full" for="star4"
                            title="Pretty good - 4 stars"></label>
                        <input type="radio" id="star3" name="rating" value="3" {{($cek_review->rating == 3)?'checked':''}} disabled /><label class="full" for="star3"
                            title="Meh - 3 stars"></label>
                        <input type="radio" id="star2" name="rating" value="2" {{($cek_review->rating == 2)?'checked':''}} disabled /><label class="full" for="star2"
                            title="Kinda bad - 2 stars"></label>
                        <input type="radio" id="star1" name="rating" value="1" {{($cek_review->rating == 1)?'checked':''}} disabled /><label class="full" for="star1"
                            title="Sucks big time - 1 star"></label>
                    </fieldset>
                    </p>
                </div>
                <p class="col-md-12">
                    {{$cek_review->review}}
                </p>
                <hr width="100%">
            </div>
            @endif
            <br><br>
        </div>
        <div class="col-md-4">
            <p class="opening">Opening Hours</p>
            <div class="">
                <p><span class="opening-day">Senin</span> <span class="opening-hour float-right">
                        {{$operational->monday}}</p>
                <p><span class="opening-day">Selasa</span> <span class="opening-hour float-right">
                        {{$operational->tuesday}}</p>
                <p><span class="opening-day">Rabu</span> <span class="opening-hour float-right">
                        {{$operational->wednesday}}</p>
                <p><span class="opening-day">Kamis</span> <span class="opening-hour float-right">
                        {{$operational->thursday}}</p>
                <p><span class="opening-day">Jumat</span> <span class="opening-hour float-right">
                        {{$operational->friday}}</p>
                <p><span class="opening-day">Sabtu</span> <span class="opening-hour float-right">
                        {{$operational->saturday}}</p>
                <p><span class="opening-day">Minggu</span> <span class="opening-hour float-right">
                        {{$operational->sunday}}</p>
            </div>
            <p class="opening mt-5">More Info</p>
            <div class="">
                @php
                $informations = explode('|',$informations->info)
                @endphp
                @foreach ($informations as $information)
                   @if($information)
                   <p><i class="fas fa-check" style="color:#2196F3"></i> {{$information}}</p>
                   @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($reviews as $review)
        <div class="col-md-12">
            <p class="name">{{$review->user->name}} | {{\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $review->user->created_at)->format('Y-m-d')}}</p>
            <div class="row pl-3">
                @for ($i = 0; $i < $review->rating; $i++)
                <i class="fa fa-star"></i>
                @endfor
            </div>
        </div>
        <div class="col-md-12">
            {{$review->review}}
        </div>
        <hr>
        @endforeach
    </div>
</div>
<a href="#" class="float" style="bottom: 90px">
    <i class="fa fa-plus my-float"></i>
</a>
<a href="#" class="float" id="listRes">
    <i class="fa fa-list my-float"></i>
</a>

<style>
    .main-nav {
display: none;
opacity: 0;
font-family: sans-serif;
position: fixed;
bottom: 90px;
right: 90px;
transition: opacity 250ms;
}
.main-nav.active {
display: block;
opacity: 1;
transition: opacity 250ms;
}
.main-nav > ul {
width: 130%;
display: block;
list-style: none;
margin: 0;
padding: 0;
background-color: white;
box-shadow: 2px 2px 8px #777;
border-radius: 3px 3px 33.5px 3px;
}
.main-nav > ul > li > a {
margin:10px;
background: grey;
text-decoration: none;
display: block;
font-weight: 200;
padding: 12px 80px 12px 12px;
color: black;
}
.main-nav > ul > li > a:hover {
font-weight: 400;
}
</style>
<div class="main-nav col-md-3 col-12" id="main-nav">
    <ul>
      <li><a href="#">Degree Programs</a></li>
      <li><a href="#">Admissions</a></li>
      <li><a href="#">Alumni & Friends</a></li>
      <li><a href="#">Campus Community</a></li>
      <li><a href="#">Parents</a></li>
      <li><a href="#">Account Login</a></li>
    </ul>
  </div>
@endsection
@push('post-script')
  <script>
    $('#listRes').click(function() {
        $('.main-nav').toggleClass('active');
    });
</script>
@endpush
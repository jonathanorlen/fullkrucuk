@extends('layouts.krucuk')
@section('title','Welcome')
@push('post-style')
<link rel="stylesheet" href="{{url('frontend/plugin/slick/slick.css')}}">
<style type="text/css">
     .slider {
          width: 100%;
          overflow: hidden;
     }

     .slides {
          display: flex;
          overflow-x: auto;

          border-radius: 5px;

          scroll-behavior: smooth;

          -webkit-overflow-scrolling: touch;
          scroll-snap-points-x: repeat(300px);
          scroll-snap-type: mandatory;
     }

     .slides::-webkit-scrollbar {
          width: 10px;
          height: 6px;
     }

     .slides::-webkit-scrollbar-thumb {
          background: #f9f9f9;
          border-radius: 10px;
          padding-left: 10px;
     }

     .slides::-webkit-scrollbar-track {
          background: transparent;
     }

     .slider>a {
          display: inline-flex;
          width: 1.5rem;
          height: 1.5rem;
          background: white;
          text-decoration: none;
          align-items: center;
          justify-content: center;
          border-radius: 50%;
          margin: 0 0 0 0;
          position: relative;
     }

     .slider>a:active {
          top: 1px;
     }

     .slider>a:focus {
          background: #000;
     }

     .slides>a>div {
          flex-shrink: 0;
          width: 70%;
          border-radius: 10px;
          transform-origin: center center;
          transition: transform 0.5s;
          transform: scale(1);
          position: relative;

          display: flex;
     }

     .slides>a>div:target {
          transform: scale(0.8);
     }

     #scroll {
          position: fixed;
          right: 10px;
          bottom: 10px;
          cursor: pointer;
          width: 50px;
          height: 50px;
          background-color: #3498db;
          text-indent: -9999px;
          display: none;
          -webkit-border-radius: 60px;
          -moz-border-radius: 60px;
          border-radius: 60px
     }

     #scroll span {
          position: absolute;
          top: 50%;
          left: 50%;
          margin-left: -8px;
          margin-top: -12px;
          height: 0;
          width: 0;
          border: 8px solid transparent;
          border-bottom-color: #ffffff;
     }

     #scroll:hover {
          background-color: #e74c3c;
          opacity: 1;
          filter: "alpha(opacity=100)";
          -ms-filter: "alpha(opacity=100)";
     }

     div.title-shadow:after {
          position: absolute;
          content: '';
          width: 100%;
          top: 60%;
          left: 0;
          border-radius: 12px;
          background-image: linear-gradient(to bottom, rgba(255, 0, 0, 0), rgba(0, 0, 0, 0.30));
          /*      box-shadow: 0 100px 5px 5px;*/
          z-index: 10;
     }

     .slick-slide {
          width: 650px;
          border-radius:12px
     }
</style>
@endpush
@section('content')
<div class="container-fluid p-0">
     <div class="for_slick_slider multiple_item row">
          @foreach ($banners as $banner)    
          <div class="mr-2 ml-2 ">
               <img class="col-md-12 p-0" style="border-radius:12px" src="{{Storage::url('public/banners/'.$banner->image)}}">
          </div>
          @endforeach
     </div>
</div>

<div class="container">
     <div class="row mt-5">
          <div class="col-md-12 pl-4 pr-4">
               <div class="header-section">
                    Category
               </div>
               <div class="subheader-section" style="margin-bottom: 0px">
                    Find restaurants based on your favorite type of food
               </div>
          </div>
          <div class="slider pl-sm-3 pr-sm-3">
               <div class="slides">
                    <div class="p-2 ml-2 d-block d-sm-none"></div>
                    @foreach ($categories as $category)
                    <div class="col-5 col-md-2 col-sm-12 mr-md-auto mr-sm-2 mr-2 mt-3 p-sm-0 p-md-1 p-0">
                         <a href="{{route('category',$category->slug)}}">
                              <div class="card-category" style="background-image:grey;background-image: url({{Storage::url('public/cover/'.$category->cover)}})">
                                   {{$category->title}}
                              </div>
                         </a>
                    </div>
                    @endforeach
                    <div class="p-2 d-block d-sm-none"></div>
               </div>
          </div>
     </div>
     <div class="row mt-4 mb-5 p-2">
          <div class="col-md-12">
               <div class="header-section">
                    Popular Place
               </div>
               <div class="subheader-section">
                    The place that is most often sought now
               </div>
          </div>
          @forelse ($merchants as $merchant)
          <a href="{{route('detail',$merchant->id)}}" class="col-md-3 card-content">
               <div class="card-image" style="background-image: url({{Storage::url('cover/'.$merchant->cover)}})"></div>
               <div class="card-tit">{{$merchant->place}}</div>
               <div class="card-place">{{$merchant->address}}</div>
               <div class="card-detail-category">{{isset($merchant->category->title)?$merchant->category->title:''}}</div>
          </a>
          @empty
              <h2>Data EMpty</h2>
          @endforelse
     </div>
</div>
@endsection

@push('post-script')
<script src="{{url('frontend/plugin/slick/slick.min.js')}}"> </script>
<script type="text/javascript">
     $(function () {
          $(".multiple_item").slick({
               infinite: true,
               slidesToShow: 3,
               centerMode: true,
               arrows:false,
               variableWidth: true,
               responsive: [{
                         breakpoint: 1024,
                         settings: {
                              slidesToShow: 3,
                              slidesToScroll: 3,
                              infinite: true,
                         }
                    },
                    {
                         breakpoint: 600,
                         settings: {
                              slidesToShow: 2,
                              slidesToScroll: 2,
                              infinite: true,
                              variableWidth: false,
                         }
                    },
                    {
                         breakpoint: 480,
                         settings: {
                              slidesToShow: 1,
                              slidesToScroll: 3,
                              variableWidth: false,
                         }
                    }
                    // You can unslick at a given breakpoint now by adding:
                    // settings: "unslick"
                    // instead of a settings object
               ]
          });
     });
</script>
@endpush
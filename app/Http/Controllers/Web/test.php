<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Krucuk_model\Merchant;
use App\Krucuk_model\Operational;
use App\Krucuk_model\Information;
use App\Krucuk_model\Gallery;
use Session;
use Illuminate\Support\Facades\Storage;


class test extends Controller
{   
     public function index($slug){
          $data['category']   = Category::where('slug',$slug)
                                  ->first();
          // $count =  Merchant::selectRaw('count(rv.id) as count')
          //           ->leftJoin('reviews as rv', 'rv.merchant_id', '=', 'merchants.id')
          //           ->where('category_id',$data['category']->id)
          //           ->take(8)
          //           ->get();
          // print_r($count);
          $sum =  Merchant::select('reviews.rating as rating')
                    ->leftJoin('reviews', 'reviews.merchant_id', '=', 'merchants.id')
                    ->where('category_id',$data['category']->id)
                    ->take(8)
                    ->get();
          print_r($sum);
          $data['merchants']  = Merchant::leftJoin('reviews as rv', 'rv.merchant_id', '=', 'merchants.id')
                                  ->where('category_id',$data['category']->id)
                                  ->take(8)
                                  ->get();
          // return view('pages.krucuk.category',$data);
      }
}
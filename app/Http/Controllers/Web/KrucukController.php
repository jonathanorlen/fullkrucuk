<?php

namespace App\Http\Controllers\Web;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Providers\RouteServiceProvider;
// Request
use App\Http\Requests\Krucuk\RegisterRequest;
use App\Http\Requests\Krucuk\RegisterMerchantRequest;
use Illuminate\Http\Request;
use App\User;
use App\Category;
use App\Banner;
use App\Krucuk_model\Merchant;
use App\Krucuk_model\Operational;
use App\Krucuk_model\Gallery;
use App\Krucuk_model\Information;
use App\Krucuk_model\Review;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class KrucukController extends Controller
{   
    use RegistersUsers;
    
    public function index(){
        $data['categories'] = Category::where('status',1)
                            ->get();
        $data['banners']    = Banner::where('status',1)->get();
        $data['merchants'] = Merchant::with(['category'])
                            ->where('status',1)
                            ->take(8)
                            ->get();
        return view('pages.krucuk.index',$data);
    }

    public function detail($id){
        $data['merchant']       = Merchant::where('id',$id)->first();
        $data['operational']    = Operational::where('merchant_id',$id)->first();
        $data['informations']   = Information::where('merchant_id',$id)->first();
        $data['galleries']      = Gallery::where('merchant_id',$id)->take(5)->get();
        $data['reviews']        = Review::with(['user'])->where('merchant_id',$id)->get();
        $data['total_rate']     = round($data['reviews']->sum('rating') / $data['reviews']->count());
        $data['cek_review']     = (Auth::user())?Review::where('user_id',Auth::user()->id)->first():'';
        return view('pages.krucuk.detail',$data);
    }

    public function category($slug){
        $data['category'] = Category::where('slug',$slug)
                            ->first();
        $data['merchants'] = Merchant::with(['category'])
                            ->where('category_id',$data['category']->id)
                            ->take(8)
                            ->get();
        return view('pages.krucuk.category',$data);
    }

    public function search(Request $request){
        $category = Category::where('slug', $request->category)->first();
        $data['merchants'] = Merchant::where('place','like',"%".$request->search."%")
                            ->get();
        $data['categories'] = Category::get();
        return view('pages.krucuk.search',$data);
    }

    public function login(){
        return view('pages.krucuk.login');
    }

    public function register(){
        return view('pages.krucuk.register');
    }

    protected function registerCreate(RegisterRequest $request)
    {   
        $data = [
            'name' => $request['name'],
            'email' => $request['email'],
            'role' => 'user',
            'password' => Hash::make($request['password']),
        ];

        User::create($data);

        return redirect()->route('index');
    }

    public function loginMerchant(){
        return view('pages.krucuk.login-merchant');
    }

    public function registerMerchant(){
        return view('pages.krucuk.register-merchant');
    }

    protected function registerMerchantCreate(RegisterMerchantRequest $request)
    {   
        $userData =[
            'name'      => $request->name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'password'  => Hash::make($request['password']),
            'role'      => 'merchant'
        ];

        $userId = User::create($userData)->id;
        
        $merchantData = [
            'email'     => $request->email,
            'user_id'   => $userId,
            'address'   => $request->address,
            'place'     => $request->place,
        ];
        Merchant::create($merchantData);

        return redirect()->route('index');
    }

    public function rateMerchant(Request $request){
        $data = [
            'user_id'       => Auth::user()->id,
            'rating'        => $request->rating,
            'review'        => $request->review,
            'merchant_id'   => $request->merchant_id
        ];

        Review::create($data);

        return redirect()->route('detail',$request->merchant_id);
        
    }
}

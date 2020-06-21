<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use App\Krucuk_model\Review;
use Session;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{   
    private $merchant;
    private $user;
    
    // public function __construct()
    // {   
    //     $this->user       = Session::get('id');
    //     $this->merchant   = Merchant::where('user_id',$this->user)
    //                             ->first();
    // }
    
    public function index(){
        return view();
    }

    public function comment(){
        $id = Session::get('id');
        $data['comments']   = Review::with(['merchant'])
                            ->where('user_id',$id)
                            ->get();

        return view('pages.krucuk.user-comment',$data);
    }

    public function settingUpdate(Request $request){
        $id = Session::get('id');

        $merchantData = [
            'category_id'       => $request->category,
            'price'             => $request->min_price.' - '.$request->max_price,
            'place'             => $request->place,
            'email'             => $request->email,
            'address'           => $request->address,
            'category_id'       => $request->category,
            'instagram'         => $request->instagram,
            'twitter'           => $request->twitter,
            'facebook'          => $request->facebook,
            'phone'             => $request->phone,
        ];

        if($request->hasFile('cover')){
            $file       = $request->file('cover');
            $name       = 'cover'.time();
            $extension  = $file->getClientOriginalExtension();
            $newName    = $name.'.'.$extension;
            $path       = $request->file('cover')->storeAs('public/cover',$newName);

            $merchantData['cover'] = $newName;
        }

        $merchant = Merchant::where('user_id',$id)->first();
        $merchant->update($merchantData);

        return redirect()->route('merchant-setting');
    }

    public function explode($data){
        return explode(" - ",$data);
    }

    public function operational(){
        $id = Session::get('id');
        $data['merchant'] = Merchant::where('user_id',$id)->first();
        $operational = Operational::where('merchant_id',$data['merchant']->id)->first();
        
        $data['sunday']     = ($operational->sunday != 'close' && $operational->sunday) ? $this->explode($operational->sunday) : 'close';
        $data['monday']     = ($operational->monday != 'close' && $operational->monday) ? $this->explode($operational->monday) : 'close';
        $data['tuesday']    = ($operational->tuesday != 'close' && $operational->tuesday) ? $this->explode($operational->tuesday) : 'close';
        $data['wednesday']  = ($operational->wednesday != 'close' && $operational->wednesday) ? $this->explode($operational->wednesday) : 'close';
        $data['thursday']   = ($operational->thursday != 'close' && $operational->thursday) ? $this->explode($operational->wednesday) : 'close';
        $data['friday']     = ($operational->friday != 'close' && $operational->friday) ? $this->explode($operational->friday) : 'close';
        $data['saturday']   = ($operational->saturday != 'close' && $operational->saturday) ? $this->explode($operational->saturday) : 'close';
        
        return view('pages.krucuk.merchant-operational',$data);
    }

    public function operationalUpdate(Request $request){
        $id = Session::get('id');
        $merchant = Merchant::where('user_id',$id)->first();

        echo $request->monday_open;
        $monday             = $request->monday;
        $data['monday']     = ($monday != 'close')? $request->monday_open.' - '.$request->monday_close : 'close';

        $tuesday            = $request->tuesday;
        $data['tuesday']    = ($tuesday != 'close')? $request->tuesday_open.' - '.$request->tuesday_close : 'close';

        $wednesday          = $request->wednesday;
        $data['wednesday']  = ($wednesday != 'close')? $request->wednesday_open.' - '.$request->wednesday_close : 'close';

        $thursday           = $request->thursday;
        $data['thursday']   = ($thursday != 'close')? $request->thursday_open.' - '.$request->thursday_close : 'close';

        $friday             = $request->friday;
        $data['friday']     = ($friday != 'close')? $request->friday_open.' - '.$request->friday_close : 'close';

        $saturday           = $request->saturday;
        $data['saturday']   = ($saturday != 'close')? $request->saturday_open.' - '.$request->saturday_close : 'close';

        $sunday             = $request->sunday;
        $data['sunday']     = ($sunday != 'close')? $request->sunday_open.' - '.$request->sunday_close : 'close';
        
        $operational = Operational::where('merchant_id',$merchant->id);
        if(!$operational){
            Operational::create($data);
        }else{
            $operational->update($data);
        }

        return redirect()->route('merchant-operational');
    }

    public function information(){
        $id                     = Session::get('id');
        $data['merchant']       = Merchant::where('user_id',$id)->first();
        $data['informations']   = Information::where('merchant_id',$data['merchant']->id)->first()->info;
        return view('pages.krucuk.merchant-information',$data);
    }

    public function informationUpdate(Request $request){
        $id                     = Session::get('id');
        $data['merchant']       = Merchant::where('user_id',$id)->first();
        $data['merchant_id']    = $merchant->id;
        $data['info']           = '';
        foreach($request->info as $item){
            $data['info'] = $item.'|'.$data['info'];
        }

        $informations = Information::where('merchant_id', $merchant->id)->first();
        if(!$informations){
            Information::create($data);
        }else{
            $informations->update($data);
        }

        return redirect()->route('merchant-information');
    }

    public function gallery(){
        $id                 = Session::get('id');
        $data['merchant']   = Merchant::where('user_id',$id)->first();
        $data['galleries']  = Gallery::where('merchant_id',$data['merchant']->id)->get();
        return view('pages.krucuk.merchant-gallery',$data);
    }

    public function galleryUpdate(Request $request){
        $id                     = Session::get('id');
        $data['merchant']       = Merchant::where('user_id',$id)->first();
        $data['merchant_id']    = $data['merchant']->id;

        $file           = $request->file('image');
        $name           = 'image'.time();
        $extension      = $file->getClientOriginalExtension();
        $newName        = $name.'.'.$extension;
        $path           = $request->file('image')->storeAs('public/galleries',$newName);
        $data['image']  = $newName;
        Gallery::create($data);
        
        return redirect()->route('merchant-gallery');
    }

    public function galleryDelete($id){
        $gallery = Gallery::where('id',$id)->first();
        Storage::delete('public/galleries', $gallery->image);
        $gallery->delete();
        return redirect()->route('merchant-gallery');
    }

    public function menu(){
        $id                 = Session::get('id');
        $data['merchant']   = Merchant::where('user_id',$id)->first();
        return view('pages.krucuk.merchant-menu',$data);
    }

    public function menuUpdate(Request $request){
        $id             = Session::get('id');
        $merchant       = Merchant::where('user_id',$id)->first();

        $file           = $request->file('menu');
        $name           = 'menu'.time();
        $extension      = $file->getClientOriginalExtension();
        $newName        = $name.'.'.$extension;
        $path           = $request->file('menu')->storeAs('public/galleries',$newName);
        $data['menu']   = $newName;
        Storage::delete('public/galleries',$request->menu_lama);
        Merchant::where('user_id',$id)->update($data);

        return redirect()->route('merchant-menu');
    }
}

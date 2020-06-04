<?php

namespace App\Http\Controllers\Admin;

use App\Banner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;

class BannerController extends Controller
{
    public function index(){
        $data['banners'] = Banner::all();
        return view('pages.admin.banner.index',$data);
    }

    public function create()
    {   
        $form = 'create';
        return view('pages.admin.banner.form',['form'=>$form]);
    }

    public function store(Request $request)
    {   
        $data = $request->all();

        $file = $request->file('image');
        $name = 'image'.time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name.'.'.$extension;
        $path = $request->file('image')->storeAs('public/banners',$newName);
        $data['image'] = $newName;

        Banner::create($data);
        return redirect()->route('banner.index');
        
    }

    public function edit($id)
    {
        $item = Banner::findOrFail($id);
        $form = 'edit';
        return view('pages.admin.banner.form',[
            'item' => $item,
            'form' => $form
        ]);
    }

    public function update(Request $request, $id)
    {   
        $data = $request->all();
        $item = Banner::findOrFail($id);

        if($request->hasFile('image')){
            $file = $request->file('image');
            $name = 'image'.time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name.'.'.$extension;
            $path = $request->file('image')->storeAs('public/banners',$newName);
            $data['image'] = $newName;
            Storage::delete('public/banner',$request->image_lama);
        }

        $item->update($data);
        return redirect()->route('banner.index');
    }

    public function destroy($id)
    {
        $item = Banner::findOrfail($id);
        $item->delete();

        return redirect()->route('banner.index');
    }
}

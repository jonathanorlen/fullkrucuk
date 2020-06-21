<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\Admin\CategoryRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Storage;

class CategoryController extends Controller
{
    public function index(){
        $category = Category::all();
        return view('pages.admin.category.index',[
            'contents' => $category
        ]);
    }

    public function create()
    {   
        $form = 'create';
        return view('pages.admin.category.form',['form'=>$form]);
    }

    public function store(CategoryRequest $request)
    {   
        $data = $request->all();
        $data['slug'] = Str::slug($data['title'],'-');

        $file = $request->file('cover');
        $name = 'cover'.time();
        $extension = $file->getClientOriginalExtension();
        $newName = $name.'.'.$extension;
        $path = $request->file('cover')->storeAs('public/galleries',$newName);
        $data['cover'] = $newName;

        Category::create($data);
        return redirect()->route('category.index');
        
    }

    public function edit($id)
    {
        $item = Category::findOrFail($id);
        $form = 'edit';
        return view('pages.admin.category.form',[
            'item' => $item,
            'form' => $form
        ]);
    }

    public function update(Request $request, $id)
    {   
        $data = $request->all();
        $item = Category::findOrFail($id);

        if($request->hasFile('cover')){
            $file = $request->file('cover');
            $name = 'cover'.time();
            $extension = $file->getClientOriginalExtension();
            $newName = $name.'.'.$extension;
            $path = $request->file('cover')->storeAs('public/cover',$newName);
            $data['cover'] = $newName;
            Storage::delete('public/cover',$request->cover_lama);
        }

        $item->update($data);
        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $item = Category::findOrfail($id);
        $item->delete();

        return redirect()->route('category.index');
    }
}

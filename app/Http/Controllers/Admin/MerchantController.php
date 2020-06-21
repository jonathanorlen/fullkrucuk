<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Merchant;
use App\User;

class MerchantController extends Controller
{
    public function index(){
        $data['merchants'] = Merchant::get();
        return view('pages.admin.merchant.index', $data);
    }

    public function edit($id)
    {   
        $data['form'] = 'edit';
        $data['item'] = Merchant::findOrFail($id);
        return view('pages.admin.merchant.form',$data);
    }

    public function update(Request $request, $id)
    {   
        $data['status'] = $request->status;
        $data['message'] = ($request->status == 1)?'':$request->message;
        $db = Merchant::where('id',$id)->update($data);
        return redirect()->route('merchant.index');
    }
}

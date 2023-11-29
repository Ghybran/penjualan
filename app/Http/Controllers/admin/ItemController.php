<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    function show_item()
    {
     $item=Item::all();
     return view('admin.item',compact('item'));
    }

    function form_item()
    {
        $item=Item::all();
     return view('admin.form-item',compact('item'));
    }
    public function add_item(Request $request)
    {
        $request->validate([
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        if ($request->hasfile('filename')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('/image'), $filename);

            $user_id = Auth::id();

            Item::create([
                'user_id' => $user_id,
                'name' => $request->name,
                'price' => $request->price,
                'categori' => $request->categori,
                'image' => $filename,
            ]);
            return redirect()->back()->with('success','Barang berhasil ditambahkan');
        }else{
            echo'Gagal';
        }

    }
}

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
       $user = Auth::User() ;
     $item=Item::where('user_id', $user->id)->get();
     return view('admin.item',compact('item'));
    }

    // function form_item()
    // {
    //     $item=Item::all();
    //  return view('admin.form-item',compact('item'));
    // }
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

    // function update_item(Request $request)
    // {
    //     $item=Item::find(request('id_barang'));
    //     $item->name=$request('name');
    //     $item->price=$request('price');
    //     $item->categori=$$request->categori;
    //     $item->save();
    //    return redirect()->back()->with('succes','Berhasil DiUpdate');
    // }

    // function delete_item(Request $request,$id_barang)
    // {
    //     // dd(request('id'));
    // //  $item = Item::find(request('id_barang'));
    //  Item::destroy($id_barang);
    // //  $item->destroy();
    //  return redirect()->back()->with('succes','Berhasil DiDelete');
    // }
    function update_item(Request $request)
    {
        // dd('id_barang');
        $item = Item::find($request->input('id_barang'));

        if ($item) {
            $item->name = $request->input('name');
            $item->price = $request->input('price');
            $item->categori = $request->input('categori');
            $item->save();
            return redirect()->back()->with('success', 'Berhasil Diupdate');
        } else {
            return redirect()->back()->with('error', 'Item tidak ditemukan');
        }
    }

    public function delete_item(Request $request)
    {
        // dd('id_barang');
        $id_barang = $request->input('id_barang');

        Item::destroy($id_barang);

        return redirect()->back()->with('success', 'Item berhasil dihapus');
    }
}

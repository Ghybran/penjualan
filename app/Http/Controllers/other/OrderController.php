<?php

namespace App\Http\Controllers\other;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    function show ()
    {
        $order= Order::all();
        // $total= Order::find()->quantity();
        // $total2= order::find()->price();
        // $c = $total*$total2;

        return view('orderan',compact('order'));
    }
    function order ()
    {
     $order= new Order([
        'id_barang'=>request('id_barang'),
        'name_barang'=>request('name_barang'),
        'user_id'=>Auth::User()->id,
        'price'=>request('price'),
        'quantity'=>request('quantity'),
        'total_price'=>request('total_quantity'),
        'address'=>Auth::User()->address,
     ]);
     $order->save();
     return redirect()->back()->with('succes','berhasil');
    }
}

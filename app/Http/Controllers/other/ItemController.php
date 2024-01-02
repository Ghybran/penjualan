<?php

namespace App\Http\Controllers\other;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    function show()
    {
     $other = Item::all();
     return view('other.dashboard-other',compact('other'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function admin()
    {
     return view('admin/dashboard-admin');
    }
    function master()
    {
     return view('master.dashboard-master');
    }
    function other()
    {
     return view('other.dashboard-other');
    }
}

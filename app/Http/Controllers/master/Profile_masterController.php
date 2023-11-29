<?php

namespace App\Http\Controllers\master;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Profile_masterController extends Controller
{
    function read()
    {
     $profile = User::all();
     return view('master.profile-master',compact('profile'));
    }

    function update_master(Request $request,$id)
    {
      DB::table('users')->where('users.id', $id)->update([
              'name'=> $request->name,
            //   'age'=> $request->age,
              'address'=> $request->address,
              'phone'=> $request->phone,
              'job'=> $request->job,

          ]);

          // $profile = User::find($request->id);
          //     $profile->name = $request->name;
          //     $profile->age = $request->age;
          //     $profile->address = $request->address;
          //     $profile->phone = $request->phone;
          //     $profile->birthday = $request->birthday;
          //     $profile->save();
          return redirect()->back()->with('success', 'Profile updated successfully');
    }
}

<?php

namespace App\Http\Controllers\other;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Profile_otherController extends Controller
{
    function other()
    {
     return view('other.profile');
    }
    // function profile_other()
    // {
    //  $other=User::all();
    //  return view('other.profile',compact('other'));
    // }
    function update_other(Request $request,$id)
    {
        $request->validate([
            'filename' => 'required',
            'filename.*' => 'mimes:doc,docx,PDF,pdf,jpg,jpeg,png|max:2000'
        ]);
        if ($request->hasfile('filename')) {
            $filename = round(microtime(true) * 1000).'-'.str_replace(' ','-',$request->file('filename')->getClientOriginalName());
            $request->file('filename')->move(public_path('/image'), $filename);

      DB::table('users')->where('users.id', $id)->update([
              'name'=> $request->name,
              'image'=>$request->filename,
            //   'age'=> $request->age,
              'address'=> $request->address,
              'phone'=> $request->phone,
            //   'job'=> $request->job,

          ]);

          // $profile = User::find($request->id);
          //     $profile->name = $request->name;
          //     $profile->age = $request->age;
          //     $profile->address = $request->address;
          //     $profile->phone = $request->phone;
          //     $profile->birthday = $request->birthday;
          //     $profile->save();
          return redirect('other');
    }
    }
}

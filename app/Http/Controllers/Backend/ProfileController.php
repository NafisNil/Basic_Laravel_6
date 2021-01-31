<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Auth;

class ProfileController extends Controller
{
    //
    public function view()
    {
        # code...
        $id = Auth::user()->id;
        $user = User::find($id);

        return view('backend.user.view-profile', compact('user'));
    }

    public function edit()
    {
        # code...
        $id = Auth::user()->id;
        $editData = User::find($id);
        return view('backend.user.edit-profile', compact('editData'));
    }

    public function update(Request $request)
    {
        # code...
        $id = Auth::user()->id;
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->mobile = $request->mobile;
        $user->address = $request->address;
        $user->gender = $request->gender;

        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_image/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_image/'), $filename);
            $user['photo'] = $filename;
        }

        $user->save();
        return redirect()->route('profile.view')->with('success','Profile updated successfully');
    }

    public function passwordView()
    {
        # code...
        return view('backend.user.edit-passwword') ;

    }

    public function passwordUpdate(Request $request)
    {
        # code...
        if(Auth::attempt(['id'=>Auth::user()->id, 'password'=>$request->current_password])){
            $user = User::find(Auth::user()->id);
            $user->password = bcrypt($request->new_password);
            $user->save();
            return redirect()->route('profile.view')->with('success','Password Successfully updated!');
        }else{
            return redirect()->back()->with('error','Sorry! Current password does not match');
        }
    }
}

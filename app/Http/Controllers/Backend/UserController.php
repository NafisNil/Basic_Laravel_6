<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    //
    public function view()
    {
        # code...
        $data['allData'] = User::all();
        return view('backend.user.view-user', $data);
    }

    public function add()
    {
        # code...
        return view('backend.user.add-user');
    }

    public function store(Request $request)
    {
        
        # code...
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users,email'
        ]);
        $data = new User;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->password =bcrypt($request->password);
        $data->usertype = $request->usertype;
        $data->save();
        return redirect()->route('user.view')->with('success','Data inserted successfully');
    }

    public function edit($id)
    {
        # code...
        $edit = User::find($id);
        return view('backend.user.edit-user', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required'
        ]);
        $data =User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
     
        $data->usertype = $request->usertype;
        $data->save();
        return redirect()->route('user.view')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        # code...
        $data = User::find($id);
        if(file_exists('public/upload/user_image/'.$data->image) AND ! empty($user->image)){
            unlink('public/upload/user_image/'.$data->image);
        }
        $data->delete();
        return redirect()->route('user.view')->with('success','Data deleted successfully');
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Logo;

class LogoController extends Controller
{
    //
    public function view()
    {
        # code...
        $data['allData'] = Logo::all();
        $data['countLogo'] = Logo::count();
        return view('backend.logo.view-logo', $data);
    }

    public function add()
    {
        # code...
        return view('backend.logo.add-logo');
    }

    public function store(Request $request)
    {
        
        # code...
        $this->validate($request, [
            'image' => 'required',
          
        ]);
        $data = new Logo;
        $data->created_by = Auth::user()->id;
        if($request->file('image')){
            $file = $request->file('image');
            //@unlink(public_path('upload/user_image/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_image/'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('logo.view')->with('success','Data inserted successfully');
    }

    public function edit($id)
    {
        # code...
        $edit = Logo::find($id);
        return view('backend.logo.edit-logo', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $this->validate($request, [
            'image' => 'required',
          
        ]);
        $data =  Logo::find($id);
        $data->updated_by = Auth::user()->id;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/logo_image/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_image/'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('logo.view')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        # code...
        $data = Logo::find($id);
        if(file_exists('public/upload/logo_image/'.$data->image) AND ! empty($data->image)){
            unlink('public/upload/logo_image/'.$data->image);
        }
        $data->delete();
        return redirect()->route('logo.view')->with('success','Data deleted successfully');
    }
}

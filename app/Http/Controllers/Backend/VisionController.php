<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Vision;

class VisionController extends Controller
{
    //
    public function view()
    {
        # code...
       $data['allData'] = Vision::all();
        $data['countVision'] = Vision::count();
        return view('backend.vision.view-vision', $data);
    }

    public function add()
    {
        # code...
        return view('backend.vision.add-vision');
    }

    public function store(Request $request)
    {
        
        # code...
        $this->validate($request, [
            'image' => 'required| mimes:jpeg,jpg,png,gif',
            'title' => 'required'
        ]);
        $data = new Vision;
        $data->created_by = Auth::user()->id;
        $data->title = $request->title;
        $data->description = $request->description;
        if($request->file('image')){
            $file = $request->file('image');
            //@unlink(public_path('upload/user_image/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision_image/'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('vision.view')->with('success','Data inserted successfully');
    }

    public function edit($id)
    {
        # code...
        $edit = Vision::find($id);
        return view('backend.vision.edit-vision', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,gif',
          
        ]);
        $data =  Vision::find($id);
        $data->updated_by = Auth::user()->id;
        $data->title = $request->title;
        $data->description = $request->description;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/vision_image/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/vision_image/'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('vision.view')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        # code...
        $data = Vision::find($id);
        if(file_exists('public/upload/vision_image/'.$data->image) AND ! empty($data->image)){
            unlink('public/upload/vision_image/'.$data->image);
        }
        $data->delete();
        return redirect()->route('vision.view')->with('success','Data deleted successfully');
    }
}

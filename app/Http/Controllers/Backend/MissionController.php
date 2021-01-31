<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Mission;


class MissionController extends Controller
{
    //
    public function view()
    {
        # code...
       $data['allData'] = Mission::all();
        $data['countMission'] = Mission::count();
        return view('backend.mission.view-mission', $data);
    }

    public function add()
    {
        # code...
        return view('backend.mission.add-mission');
    }

    public function store(Request $request)
    {
        
        # code...
        $this->validate($request, [
            'image' => 'required| mimes:jpeg,jpg,png,gif',
            'title' => 'required'
        ]);
        $data = new Mission;
        $data->created_by = Auth::user()->id;
        $data->title = $request->title;
        $data->description = $request->description;
        if($request->file('image')){
            $file = $request->file('image');
            //@unlink(public_path('upload/user_image/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission_image/'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('mission.view')->with('success','Data inserted successfully');
    }

    public function edit($id)
    {
        # code...
        $edit = Mission::find($id);
        return view('backend.mission.edit-mission', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $this->validate($request, [
            'image' => 'mimes:jpeg,jpg,png,gif',
          
        ]);
        $data =  Mission::find($id);
        $data->updated_by = Auth::user()->id;
        $data->title = $request->title;
        $data->description = $request->description;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/mission_image/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/mission_image/'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('mission.view')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        # code...
        $data = Mission::find($id);
        if(file_exists('public/upload/mission_image/'.$data->image) AND ! empty($data->image)){
            unlink('public/upload/mission_image/'.$data->image);
        }
        $data->delete();
        return redirect()->route('mission.view')->with('success','Data deleted successfully');
    }
}

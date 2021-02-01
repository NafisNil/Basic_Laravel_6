<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\NewsEvent;
use Auth;

class NewsEventController extends Controller
{
    //
    public function view()
    {
        # code...
       $data['allData'] = NewsEvent::all();
        
        return view('backend.news_event.view-news_event', $data);
    }

    public function add()
    {
        # code...
        return view('backend.news_event.add-news_event');
    }

    public function store(Request $request)
    {
        
        # code...
        $this->validate($request, [
            'image' => 'required| mimes:jpeg,jpg,png,gif',
          
        ]);
        $data = new NewsEvent;
        $data->created_by = Auth::user()->id;
        $data->short_title = $request->short_title;
        $data->date =  date('Y-m-d', strtotime($request->date)); 
        $data->long_title = $request->long_title;
        if($request->file('image')){
            $file = $request->file('image');
            //@unlink(public_path('upload/user_image/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news_event_image/'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('news_event.view')->with('success','Data inserted successfully');
    }

    public function edit($id)
    {
        # code...
        $edit = NewsEvent::find($id);
        return view('backend.news_event.edit-news_event', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $this->validate($request, [
            'image' => ' mimes:jpeg,jpg,png,gif',
          
        ]);
        $data =  NewsEvent::find($id);
        $data->updated_by = Auth::user()->id;
        $data->date =  date('Y-m-d', strtotime($request->date)); 
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/news_event_image/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/news_event_image/'), $filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('news_event.view')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        # code...
        $data = NewsEvent::find($id);
        if(file_exists('public/upload/news_event_image/'.$data->image) AND ! empty($data->image)){
            unlink('public/upload/news_event_image/'.$data->image);
        }
        $data->delete();
        return redirect()->route('news_event.view')->with('success','Data deleted successfully');
    }
}

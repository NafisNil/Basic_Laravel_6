<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Slider;

class SliderController extends Controller
{
    //
      //
      public function view()
      {
          # code...
         $data['allData'] = Slider::all();
          $data['countLogo'] = Slider::count();
          return view('backend.slider.view-slider', $data);
      }
  
      public function add()
      {
          # code...
          return view('backend.slider.add-slider');
      }
  
      public function store(Request $request)
      {
          
          # code...
          $this->validate($request, [
              'image' => 'required| mimes:jpeg,jpg,png,gif',
            
          ]);
          $data = new Slider;
          $data->created_by = Auth::user()->id;
          $data->short_title = $request->short_title;
          $data->long_title = $request->long_title;
          if($request->file('image')){
              $file = $request->file('image');
              //@unlink(public_path('upload/user_image/'.$user->image));
              $filename = date('YmdHi').$file->getClientOriginalName();
              $file->move(public_path('upload/slider_image/'), $filename);
              $data['image'] = $filename;
          }
          $data->save();
          return redirect()->route('slider.view')->with('success','Data inserted successfully');
      }
  
      public function edit($id)
      {
          # code...
          $edit = Slider::find($id);
          return view('backend.slider.edit-slider', compact('edit'));
      }
  
      public function update(Request $request, $id)
      {
          # code...
          $this->validate($request, [
              'image' => 'required| mimes:jpeg,jpg,png,gif',
            
          ]);
          $data =  Slider::find($id);
          $data->updated_by = Auth::user()->id;
          $data->short_title = $request->short_title;
          $data->long_title = $request->long_title;
          if($request->file('image')){
              $file = $request->file('image');
              @unlink(public_path('upload/slider_image/'.$data->image));
              $filename = date('YmdHi').$file->getClientOriginalName();
              $file->move(public_path('upload/slider_image/'), $filename);
              $data['image'] = $filename;
          }
          $data->save();
          return redirect()->route('slider.view')->with('success','Data updated successfully');
      }
  
  
      public function delete($id)
      {
          # code...
          $data = Slider::find($id);
          if(file_exists('public/upload/slider_image/'.$data->image) AND ! empty($data->image)){
              unlink('public/upload/slider_image/'.$data->image);
          }
          $data->delete();
          return redirect()->route('slider.view')->with('success','Data deleted successfully');
      }
}

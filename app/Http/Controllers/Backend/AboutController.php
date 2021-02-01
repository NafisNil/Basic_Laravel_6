<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\About;

class AboutController extends Controller
{
    //
    public function view()
    {
        # code...
       $data['allData'] = About::all();
        $data['countAbout'] = About::count();
        return view('backend.about.view-about', $data);
    }

    public function add()
    {
        # code...
        return view('backend.about.add-about');
    }

    public function store(Request $request)
    {
        
        # code...
        $this->validate($request, [
            'description' => 'required',
         
        ]);
        $data = new About;
        $data->created_by = Auth::user()->id;
      
        $data->description = $request->description;
        $data->save();
        return redirect()->route('about.view')->with('success','Data inserted successfully');
    }

    public function edit($id)
    {
        # code...
        $edit = About::find($id);
        return view('backend.about.edit-about', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $this->validate($request, [
            'description' => 'required',
         
        ]);
        $data =  About::find($id);
        $data->updated_by = Auth::user()->id;
   
        $data->description = $request->description;
       
        $data->save();
        return redirect()->route('about.view')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        # code...
        $data = About::find($id);
       
        $data->delete();
        return redirect()->route('about.view')->with('success','Data deleted successfully');
    }
}

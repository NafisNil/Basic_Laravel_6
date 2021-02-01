<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Service;

class ServiceController extends Controller
{
    //
    public function view()
    {
        # code...
       $data['allData'] = Service::all();

        return view('backend.service.view-service', $data);
    }

    public function add()
    {
        # code...
        return view('backend.service.add-service');
    }

    public function store(Request $request)
    {
        
        # code...
        $this->validate($request, [
            'short_title' => 'required',
          
        ]);
        $data = new Service;
        $data->created_by = Auth::user()->id;
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
        
        $data->save();
        return redirect()->route('service.view')->with('success','Data inserted successfully');
    }

    public function edit($id)
    {
        # code...
        $edit = Service::find($id);
        return view('backend.service.edit-service', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        # code...
       
        $data =  Service::find($id);
        $data->updated_by = Auth::user()->id;
        $data->short_title = $request->short_title;
        $data->long_title = $request->long_title;
       
        $data->save();
        return redirect()->route('service.view')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        # code...
        $data = Service::find($id);
       
        $data->delete();
        return redirect()->route('service.view')->with('success','Data deleted successfully');
    }
}

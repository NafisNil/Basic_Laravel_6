<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Model\Contact;

class ContactController extends Controller
{
    //
    public function view()
    {
        # code...
       $data['allData'] = Contact::all();
        $data['countContact'] = Contact::count();
        return view('backend.contact.view-contact', $data);
    }

    public function add()
    {
        # code...
        return view('backend.contact.add-contact');
    }

    public function store(Request $request)
    {
        
        # code...
        $this->validate($request, [
            'address' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
        ]);
        $data = new Contact;
        $data->created_by = Auth::user()->id;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->mobile_no = $request->mobile_no;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
        $data->save();
        return redirect()->route('contact.view')->with('success','Data inserted successfully');
    }

    public function edit($id)
    {
        # code...
        $edit = Contact::find($id);
        return view('backend.contact.edit-contact', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        # code...
        $this->validate($request, [
            'address' => 'required',
            'email' => 'required',
            'mobile_no' => 'required',
        ]);
        $data =  Contact::find($id);
        $data->updated_by = Auth::user()->id;
        $data->address = $request->address;
        $data->email = $request->email;
        $data->mobile_no = $request->mobile_no;
        $data->facebook = $request->facebook;
        $data->instagram = $request->instagram;
        $data->twitter = $request->twitter;
        $data->youtube = $request->youtube;
       
        $data->save();
        return redirect()->route('contact.view')->with('success','Data updated successfully');
    }


    public function delete($id)
    {
        # code...
        $data = Contact::find($id);
       
        $data->delete();
        return redirect()->route('contact.view')->with('success','Data deleted successfully');
    }
}

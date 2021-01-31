<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('frontend.layouts.home');
    }

    public function aboutUs()
    {
        # code...
        return view('frontend.single_pages.about-us');
    }

    public function contactUs()
    {
        # code...
        return view('frontend.single_pages.contact-us');
    }
}

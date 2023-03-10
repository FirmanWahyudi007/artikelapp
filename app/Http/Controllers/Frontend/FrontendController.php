<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.pages.home');
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function service()
    {
        return view('frontend.pages.service.index');
    }

    public function servicedetail()
    {
        return view('frontend.pages.service.detail');
    }

    public function project()
    {
        return view('frontend.pages.project.index');
    }

    public function projectdetail()
    {
        return view('frontend.pages.project.detail');
    }

    public function blog()
    {
        return view('frontend.pages.blog');
    }

    public function blogdetail()
    {
        return view('frontend.pages.blog.detail');
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    
}

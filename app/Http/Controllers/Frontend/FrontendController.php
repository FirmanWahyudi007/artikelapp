<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $get_data_post = Post::with(['category', 'user'])->where('published', 1)->InRandomOrder()->limit(3)->get();
        // return $get_data_post;

        return view('frontend.pages.home', [
            'data_post' => $get_data_post
        ]);
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
        return view('frontend.pages.blog.index');
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

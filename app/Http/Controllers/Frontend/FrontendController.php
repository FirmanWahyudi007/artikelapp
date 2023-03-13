<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $get_data_post = Post::with(['category', 'user'])->orderBy('id', 'desc')->where('published', 1)->limit(3)->get();

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

    public function postdetail(string $slug)
    {
        $get_post_detail = Post::with(['category', 'user'])->where('slug', $slug)->first();
        $recent_post = Post::orderBy('id', 'desc')->limit(5)->get();
        // dd($recent_post);

        return view('frontend.pages.blog.detail', [
            'detail_post' => $get_post_detail,
            'recent_posts' => $recent_post
        ]);
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MudVulcano;
use App\Models\Post;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $get_data_mudvulcano = MudVulcano::orderBy('id', 'desc')->limit(3)->get();
        // dd($get_data_mudvulcano);

        $get_data_post = Post::with(['category', 'user'])->orderBy('id', 'desc')->where('published', 1)->limit(3)->get();

        return view('frontend.pages.home', [
            'data_post' => $get_data_post,
            'data_mudvulcano' => $get_data_mudvulcano
        ]);
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    public function post()
    {
        $get_data_post = Post::orderBy('id', 'desc')->with(['category', 'user'])->where('published', 1)->simplePaginate(9);
        // dd($get_data_post);
        return view('frontend.pages.post.index', [
            'posts' => $get_data_post
        ]);
    }

    public function servicedetail()
    {
        return view('frontend.pages.service.detail');
    }

    public function mud_vulcano()
    {
        $mud_volcano = MudVulcano::orderBy('id', 'desc')->get();
        // return $mud_volcano;
        return view('frontend.pages.mudvulcano.index', [
            'datas' => $mud_volcano
        ]);
    }

    public function mudvulcano_detail(string $slug)
    {
        $mud_vulcano_detail = MudVulcano::with(['images', 'user'])->where('slug', $slug)->first();
        // return $mud_vulcano_detail;
        return view('frontend.pages.mudvulcano.detail', [
            'detail' => $mud_vulcano_detail
        ]);
    }

    public function blog()
    {
        return view('frontend.pages.blog.index');
    }

    public function postdetail(string $slug)
    {
        $get_post_detail = Post::with(['category', 'user'])->where('slug', $slug)->first();
        $recent_post = Post::orderBy('id', 'desc')->limit(3)->get();

        return view('frontend.pages.post.detail', [
            'detail_post' => $get_post_detail,
            'recent_posts' => $recent_post
        ]);
    }

    public function contact()
    {
        return view('frontend.pages.contact');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $get_search_post = Post::where(function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('content', 'like', '%' . $keyword . '%');
        })->simplePaginate(9);

        return view('frontend.pages.post.index', [
            'posts' => $get_search_post
        ]);
    }
}

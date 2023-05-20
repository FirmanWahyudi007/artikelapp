<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (session('success')) {
                Alert::success(session('success'));
            }

            if (session('error')) {
                Alert::error(session('error'));
            }

            return $next($request);
        });
    }

    public function index()
    {

        $get_data_post = Post::with([ 'user'])->orderBy('id', 'desc')->limit(3)->get();

        return view('frontend.pages.home', [
            'data_post' => $get_data_post,
        ]);
    }

    public function about()
    {
        return view('frontend.pages.about');
    }

    


    public function blog()
    {
        return view('frontend.pages.blog.index');
    }


    public function post()
    {
        $get_data_post = Post::orderBy('id', 'desc')->simplePaginate(9);

        return view('frontend.pages.post.index', [
            'posts' => $get_data_post,
        ]);
    }

    public function postdetail(string $slug)
    {
        $get_post_detail = Post::with(['user'])->where('slug', $slug)->with('details.comment')->first();
        $recent_post = Post::orderBy('id', 'desc')->limit(3)->get();
        // return response()->json($get_post_detail);

        return view('frontend.pages.post.detail', [
            'detail_post' => $get_post_detail,
            'recent_posts' => $recent_post
        ]);
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;

        $get_search_post = Post::where(function ($query) use ($keyword) {
            $query->where('title', 'like', '%' . $keyword . '%')
                ->orWhere('content', 'like', '%' . $keyword . '%');
        })->simplePaginate(9);

        return view('frontend.pages.post.index', [
            'posts' => $get_search_post,
            'categories' => $this->getCategory()
        ]);
    }



    //comment
    public function comment(Request $request, $id)
    {
        $request->validate([
            'comment' => 'required'
        ]);

        $comment = new Comment();
        $comment->nama = $request->nama;
        $comment->email = $request->email;
        $comment->isi_komentar = $request->comment;
        $comment->save();

        $post = Post::find($id);
        $post->details()->create([
            'comment_id' => $comment->id,
        ]);


        return redirect()->back()->with('success', 'Comment successfully added');
    }


}

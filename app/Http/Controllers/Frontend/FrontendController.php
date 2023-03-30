<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Post;
use App\Models\Comment;
use App\Models\Category;
use App\Models\MudVulcano;
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
        $get_data_mudvulcano = MudVulcano::orderBy('id', 'desc')->limit(3)->get();

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

    public function mud_vulcano()
    {
        $mud_volcano = MudVulcano::orderBy('id', 'desc')->get();
        // $user = User::withCount('vulcanos')->get();

        //tampilkan user yang mempunyai jumlah count diatas 1
        $user = User::withCount('vulcanos')->having('vulcanos_count', '>', 0)->get();

        return view('frontend.pages.mudvulcano.index', [
            'datas' => $mud_volcano,
            'users' => $user
        ]);
    }

    public function mudvulcano_detail(string $slug)
    {
        $mud_vulcano_detail = MudVulcano::with(['images', 'user'])->where('slug', $slug)->first();

        return view('frontend.pages.mudvulcano.detail', [
            'detail' => $mud_vulcano_detail
        ]);
    }

    public function blog()
    {
        return view('frontend.pages.blog.index');
    }

    private function getCategory()
    {
        $get_data_category = Category::with('posts')->get();

        return $get_data_category;
    }

    public function post()
    {
        $get_data_post = Post::orderBy('id', 'desc')->with(['category', 'user'])->where('published', 1)->simplePaginate(9);

        return view('frontend.pages.post.index', [
            'posts' => $get_data_post,
            'categories' => $this->getCategory()
        ]);
    }

    public function postdetail(string $slug)
    {
        $get_post_detail = Post::with(['category', 'user'])->where('slug', $slug)->with('comments.user', 'comments.replies')->first();
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

    public function filter(int $id)
    {
        $get_filter_data = Post::where('category_id', $id)->where('published', 1)->simplePaginate(9);
        // return $get_filter_data;
        return view('frontend.pages.post.index', [
            'posts' => $get_filter_data,
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
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $id;
        $comment->body = $request->comment;
        $comment->save();

        return redirect()->back()->with('success', 'Comment successfully added');
    }

    //statistik
    // public function statistik(Request $request)
    // {
    //     if ($request->ajax()) {
    //         $mud_volcano = MudVulcano::orderBy('id', 'desc')->with('user')->get();

    //         return response()->json($mud_volcano);
    //     }
    // }
}

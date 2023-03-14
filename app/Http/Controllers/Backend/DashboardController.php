<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\MudVulcano;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class DashboardController extends Controller
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
    //
    public function index()
    {
        //count category
        $category = Category::count();
        $post = Post::count();
        $user = User::count();
        $vulcano = MudVulcano::count();
        return view('backend.dashboard', compact('category', 'post', 'user', 'vulcano'));
    }
}

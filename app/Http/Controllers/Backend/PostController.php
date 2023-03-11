<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class PostController extends Controller
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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $posts = Post::with('category', 'user')->get();
            return datatables()->of($posts)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('post.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    //delete with form
                    $btn .= '<form action="' . route('post.destroy', $row->id) . '" method="POST" class="d-inline">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.delete') . '</button>
                            </form>';
                    if ($row->published == 1)
                        //with form
                        $btn .= '<form action="' . route('post.unpublish', $row->id) . '" method="POST" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('PUT') . '
                                    <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.unpublished') . '</button>
                                </form>';
                    else
                        //with form
                        $btn .= '<form action="' . route('post.publish', $row->id) . '" method="POST" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('PUT') . '
                                    <button type="submit" class="btn btn-success btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.published') . '</button>
                                </form>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.post.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('backend.post.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $image = $request->file('thumbnail');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('img\post'), $new_name);
        // dd($request->all());

        // data too long for column 'content' at row 1
        $post = new Post;
        $post->title = $request->title;
        $post->slug = Str::slug($request->title);
        $post->user_id = 1;
        $post->category_id = $request->category_id;
        $post->content = $request->content;
        $post->thumbnail = 'img/post/' . $new_name;
        $post->published = 1;
        $post->save();

        // $post = [
        //     'title' => $request->title,
        //     'slug' => Str::slug($request->title),
        //     'user_id' => 1,
        //     'category_id' => $request->category_id,
        //     'content' => ' $request->content',
        //     'thumbnail' => ' $request->thumbnail',
        //     'published' => 1,
        //     'created_at' => now(),
        //     'updated_at' => now(),
        // ];
        // Post::create($post);

        if ($post) {
            return redirect()->route('post.index')->with('success', trans('translation.success_message'));
        } else {
            return redirect()->route('post.index')->with('error', trans('translation.error_message'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('backend.post.create', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->thumbnail) {
            unlink(public_path($post->thumbnail));
        }
        $post->delete();

        if ($post) {
            return redirect()->route('post.index')->with('success', trans('translation.success_delete_message'));
        } else {
            return redirect()->route('post.index')->with('error', trans('translation.error_delete_message'));
        }
    }

    public function publish($id)
    {
        $post = Post::find($id);
        $post->published = 1;
        $post->save();

        if ($post) {
            return redirect()->route('post.index')->with('success', trans('translation.success_publish_message'));
        } else {
            return redirect()->route('post.index')->with('error', trans('translation.error_publish_message'));
        }
    }

    public function unpublish($id)
    {
        $post = Post::find($id);
        $post->published = 0;
        $post->save();

        if ($post) {
            return redirect()->route('post.index')->with('success', trans('translation.success_unpublish_message'));
        } else {
            return redirect()->route('post.index')->with('error', trans('translation.error_unpublish_message'));
        }
    }
}

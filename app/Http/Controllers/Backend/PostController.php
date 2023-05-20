<?php

namespace App\Http\Controllers\Backend;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Detail;
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
        // if ($request->ajax()) {
        //     if (auth()->user()->role == 'admin') {
        //         $posts = Post::with('category', 'user')->get();
        //     } else {
        //         $posts = Post::with('category', 'user')->where('user_id', auth()->user()->id)->get();
        //     }
        //     return datatables()->of($posts)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {
        //             $btn = '<a href="' . route('post.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
        //             //delete with form
        //             $btn .= '<form action="' . route('post.destroy', $row->id) . '" method="POST" class="d-inline">
        //                         ' . csrf_field() . '
        //                         ' . method_field('DELETE') . '
        //                         <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.delete') . '</button>
        //                     </form>';
        //             if ($row->published == 1)
        //                 //with form
        //                 $btn .= '<form action="' . route('post.unpublish', $row->id) . '" method="POST" class="d-inline">
        //                             ' . csrf_field() . '
        //                             ' . method_field('PUT') . '
        //                             <button type="submit" class="btn btn-warning btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.unpublished') . '</button>
        //                         </form>';
        //             else
        //                 //with form
        //                 $btn .= '<form action="' . route('post.publish', $row->id) . '" method="POST" class="d-inline">
        //                             ' . csrf_field() . '
        //                             ' . method_field('PUT') . '
        //                             <button type="submit" class="btn btn-success btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.published') . '</button>
        //                         </form>';

        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        if (auth()->user()->role == 'admin') {
            $posts = Post::with( 'user')->get();
        } else {
            $posts = Post::with( 'user')->where('user_id', auth()->user()->id)->get();
        }
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //jika bukan penulis maka akan diarahkan ke halaman post index
        if(auth()->user()->role != 'penulis'){
            return redirect()->route('post.index')->with('error', trans('translation.access_not_allowed'));
        }
        return view('backend.post.create', );
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
        $post->judul = $request->title;
        $post->slug = Str::slug($request->title);
        $post->user_id = auth()->user()->id;
        $post->isi_artikel = $request->content;
        $post->thumbnail = 'img/post/' . $new_name;
        $post->tanggal_publish = now();
        $post->save();

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
        return view('backend.post.create', compact('post'));
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
        try {
            $data = [
                'judul' => $request->title,
                'slug' => Str::slug($request->title),
                'user_id' => auth()->user()->id,
                'isi_artikel' => $request->content,
                'updated_at' => now(),
            ];
            $post = Post::find($id);
            if ($request->file('thumbnail')) {
                if ($post->thumbnail) {
                    unlink(public_path($post->thumbnail));
                }
                $image = $request->file('thumbnail');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img\post'), $new_name);
                $data['thumbnail'] = 'img/post/' . $new_name;
            }
            $post->update($data);

            return redirect()->route('post.index')->with('success', trans('translation.success_update_message'));
        } catch (\Exception $e) {
            return redirect()->route('post.index')->with('error', trans('translation.error_update_message'));
        }
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


    //comment
    public function comment($id)
    {
        $detail = Detail::with('comment')->where('post_id', $id)->get();
        return view('backend.post.comment.index', compact( 'detail'));
    }

    //commentDestroy
    public function commentDestroy($id)
    {
        $detail = Detail::find($id);
        //delete with comment
        $detail->comment()->delete();
        $detail->delete();

        return redirect()->back()->with('success', trans('translation.success_comment_delete_message'));
    }
}

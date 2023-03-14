<?php

namespace App\Http\Controllers\Backend;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
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
            $categories = Category::with('posts')->get();
            return datatables()->of($categories)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('category.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    //delete with form
                    if ($row->posts->count() == 0) {
                        $btn .= '<form action="' . route('category.destroy', $row->id) . '" method="POST" class="d-inline">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.delete') . '</button>
                            </form>';
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $category = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'created_at' => now(),
                'updated_at' => now()
            ];

            Category::create($category);

            return redirect()->route('category.index')->with('success', trans('translation.success_message'));
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', trans('translation.error_message'));
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
        $category = Category::find($id);
        return view('backend.category.create', compact('category'));
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
            $category = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'updated_at' => now()
            ];

            Category::where('id', $id)->update($category);

            return redirect()->route('category.index')->with('success', trans('translation.success_update_message'));
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', trans('translation.error_update_message'));
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
        try {
            Category::destroy($id);
            return redirect()->route('category.index')->with('success', trans('translation.success_delete_message'));
        } catch (\Exception $e) {
            return redirect()->route('category.index')->with('error', trans('translation.error_delete_message'));
        }
    }
}

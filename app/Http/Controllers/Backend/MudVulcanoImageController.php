<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\MudVulcanoImage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MudVulcanoImageController extends Controller
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
    public function index($id, Request $request)
    {
        if ($request->ajax()) {
            $images = MudVulcanoImage::where('mud_vulcano_id', $id)->get();
            return datatables()->of($images)
                ->addColumn('action', function ($images) {
                    $button = '<form action="' . route('mud-vulcano.images.destroy', $images->id) . '" method="POST" class="d-inline">
                                    ' . csrf_field() . '
                                    ' . method_field('DELETE') . '
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(`Anda Yakin ?`)">Hapus</button>
                                </form>';
                    return $button;
                })
                ->addColumn('thumbnail', function ($images) {
                    $img = '<img src="' . asset($images->path_image) . '" width="100px" height="100px">';
                    return $img;
                })
                ->rawColumns(['action', 'thumbnail'])
                ->addIndexColumn()
                ->make(true);
        }
        return view('backend.mud-vulcano.images.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mud-vulcano.images.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        try {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('img\vulcano\images'), $image_name);

            $data = [
                'mud_vulcano_id' => $id,
                'path_image' => 'img/vulcano/images/' . $image_name,
                'created_at' => now(),
                'updated_at' => now(),
            ];

            MudVulcanoImage::insert($data);

            return redirect()->route('mud-vulcano.images', $id)->with('success', trans('translation.success_message'));
        } catch (\Exception $e) {
            return redirect()->route('mud-vulcano.images', $id)->with('error', trans('translation.error_message'));
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
        //
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
        try {
            $image = MudVulcanoImage::find($id);
            if ($image->path_image) {
                unlink(public_path($image->path_image));
            }
            $image->delete();
            return redirect()->back()->with('success', trans('translation.success_unpublish_message'));
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('error', trans('translation.error_unpublish_message'));
        }
    }
}

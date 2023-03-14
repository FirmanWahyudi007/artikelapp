<?php

namespace App\Http\Controllers\Backend;

use App\Models\MudVulcano;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MudVulcanoImage;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MudVulcanoController extends Controller
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
            $mud = MudVulcano::with('user')->get();
            return datatables()->of($mud)
                ->addColumn('action', function ($mud) {
                    $button = '<a href="' . route('mud-vulcano.edit', $mud->id) . '" class="btn btn-primary btn-sm">Edit</a>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<form action="' . route('mud-vulcano.destroy', $mud->id) . '" method="POST" class="d-inline">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.delete') . '</button>
                            </form>';
                    $button .= '&nbsp;&nbsp;';
                    $button .= '<a href="' . route('mud-vulcano.images', $mud->id) . '" class="btn btn-success btn-sm">' . trans('translation.images') . '</a>';
                    return $button;
                })
                ->addColumn('thumbnail', function ($mud) {
                    $img = '<img src="' . asset($mud->thumbnail) . '" width="100px" height="100px">';
                    return $img;
                })
                ->rawColumns(['action', 'thumbnail'])
                ->addIndexColumn()
                ->make(true);
        }

        return view('backend.mud-vulcano.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.mud-vulcano.create');
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
            if ($request->file('thumbnail')) {
                $image = $request->file('thumbnail');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img\vulcano\thumbnail'), $new_name);
            }

            $data = [
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'content' => $request->content,
                'user_id' => 1,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'thumbnail' => 'img/vulcano/thumbnail/' . $new_name,
                'created_at' => now(),
                'updated_at' => now()
            ];

            $mud = MudVulcano::create($data)->id;

            // dd($request->file('images'));
            foreach ($request->images as $image) {
                // dd($image);
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img\vulcano\images'), $new_name);

                $data = [
                    'mud_vulcano_id' => $mud,
                    'path_image' => 'img/vulcano/images/' . $new_name,
                    'created_at' => now(),
                    'updated_at' => now()
                ];

                MudVulcanoImage::create($data);
            }
            return redirect()->route('mud-vulcano.index')->with('success', trans('translation.success_message'));
        } catch (\Exception $e) {
            return redirect()->route('mud-vulcano.index')->with('error', trans('translation.error_message'));
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
        $vulcano = MudVulcano::find($id);
        return view('backend.mud-vulcano.create', compact('vulcano'));
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
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'content' => $request->content,
                'address' => $request->address,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'updated_at' => now()
            ];
            $vulcano = MudVulcano::find($id);
            if ($request->file('thumbnail')) {
                if ($vulcano->thumbnail) {
                    unlink(public_path($vulcano->thumbnail));
                }
                $image = $request->file('thumbnail');
                $new_name = rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('img\vulcano\thumbnail'), $new_name);
                $data['thumbnail'] = 'img/vulcano/thumbnail/' . $new_name;
            }
            $vulcano->update($data);

            return redirect()->route('mud-vulcano.index')->with('success', trans('translation.success_update_message'));
        } catch (\Exception $e) {
            return redirect()->route('mud-vulcano.index')->with('error', trans('translation.error_update_message'));
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
            $vulcano = MudVulcano::find($id)->with('images')->first();
            if ($vulcano->thumbnail) {
                unlink(public_path($vulcano->thumbnail));
            }
            $imagesVulcano = MudVulcanoImage::where('mud_vulcano_id', $id)->get();
            if ($imagesVulcano) {
                foreach ($imagesVulcano as $image) {
                    unlink(public_path($image->path_image));
                }
            }
            $vulcano->images()->delete();
            $vulcano->delete();
            return redirect()->back()->with('success', trans('translation.success_message'));
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}

<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
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
            $users = User::all();
            return datatables()->of($users)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('users.edit', $row->id) . '" class="edit btn btn-primary btn-sm">Edit</a>';
                    //delete with form
                    $btn .= '<form action="' . route('users.destroy', $row->id) . '" method="POST" class="d-inline">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(`Anda Yakin ?`)">' . trans('translation.delete') . '</button>
                            </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('backend.users.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.users.create');
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
            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'role' => $request->role,
                'created_at' => now(),
                'updated_at' => now()
            ];

            User::create($user);
            return redirect()->route('users.index')->with('success', trans('translation.success_message'));
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', trans('translation.error_message'));
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
        $user = User::find($id);
        return view('backend.users.create', compact('user'));
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
            $user = [
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'updated_at' => now()
            ];

            if ($request->password) {
                $user['password'] = $request->password;
            }

            User::where('id', $id)->update($user);
            return redirect()->route('users.index')->with('success', trans('translation.success_update_message'));
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', trans('translation.success_update_message'));
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
            User::destroy($id);
            return redirect()->route('users.index')->with('success', trans('translation.success_delete_message'));
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', trans('translation.error_delete_message'));
        }
    }
}

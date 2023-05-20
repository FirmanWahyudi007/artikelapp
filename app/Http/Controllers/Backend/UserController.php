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
        $users = User::where('role', '!=', 'admin')->orderBy('id', 'desc')->get();
        return view('backend.users.index', compact('users'));
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
                'password' => bcrypt($request->password),
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
                $user['password'] = bcrypt($request->password);
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

    public function settings()
    {
        $user = auth()->user();
        return view('backend.users.profile', compact('user'));
    }

    //updateSettings
    public function updateSettings(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        return redirect()->route('profile')->with('success', trans('translation.profile_message'));
    }

    //active
    public function active($id)
    {
        $user = User::find($id);
        $user->is_active = 1;
        $user->save();

        return redirect()->back()->with('success', trans('translation.actived_message'));
    }

    //inactive
    public function inactive($id)
    {
        $user = User::find($id);
        $user->is_active = 0;
        $user->save();

        return redirect()->back()->with('success', trans('translation.inactive_message'));
    }
}

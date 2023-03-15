<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
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
    //index
    public function register()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard')->with('success', trans('translation.is_login'));
        }
        return view('auth.register');
    }

    //store
    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'country' => $request->country,
            'province' => $request->province,
            'city' => $request->city,
            'afiliasi' => $request->afiliasi,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        auth()->login($user);

        return redirect()->to('/');
    }
}

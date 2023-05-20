<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
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
        if (auth()->check()) {
            return redirect()->route('dashboard')->with('success', trans('translation.is_login'));
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $credentials = $request->only('email', 'password');
        } else {
            $credentials = ['username' => $request->email, 'password' => $request->password];
        }
        
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            if(auth()->user()->is_active == 0){
                auth()->logout();
                return redirect()->route('login')->with('error', trans('translation.is_active_message'));
            }else{
                return redirect()->route('post.index')->with('success', trans('translation.success_login_message'));
            }
            
        }

        return redirect()->route('login')->with('error', trans('translation.email_or_password_wrong'));
    }

    //logout
    public function logout()
    {
        auth()->logout();
        return redirect()->route('login.index')->with('success', trans('translation.success_logout_message'));
    }
}

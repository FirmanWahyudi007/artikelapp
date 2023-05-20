<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//register
Route::get('/register', [RegisterController::class, 'register'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login');
//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//route group middleware auth and prefix admin
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    // Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    // Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    //jika mengarah ke dashboard dan / maka akan diarahkan ke post index
    Route::get('/', function () {
        return redirect()->route('post.index');
    });
    Route::get('/dashboard', function () {
        return redirect()->route('post.index');
    });
    Route::resource('users', UserController::class);
    Route::get('settings', [UserController::class, 'settings'])->name('profile');
    Route::put('settings', [UserController::class, 'updateSettings'])->name('profile.update');
    Route::resource('post', PostController::class);
    Route::get('/comment/{id}', [PostController::class, 'comment'])->name('comment.index');
    Route::delete('/comment/{id}', [PostController::class, 'commentDestroy'])->name('comment.destroy');

    //user active   
    Route::get('/user/active/{id}', [UserController::class, 'active'])->name('user.active');
    Route::get('/user/inactive/{id}', [UserController::class, 'inactive'])->name('user.inactive');
    
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/lang/{locale}', [HomeController::class, 'lang'])->name('lang');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/post', [FrontendController::class, 'post'])->name('post');
Route::get('/post-detail/{slug}', [FrontendController::class, 'postdetail'])->name('post.detailView');
Route::post('/search', [FrontendController::class, 'search']);
//comment
Route::post('/comment/{id}', [FrontendController::class, 'comment'])->name('comment.store');

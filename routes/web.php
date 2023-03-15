<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\MudVulcanoController;
use App\Http\Controllers\Backend\MudVulcanoImageController;

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

Route::get('/login', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'login'])->name('login');
//logout
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

//route group middleware auth and prefix admin
Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function () {
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('users', UserController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('mud-vulcano', MudVulcanoController::class);
    Route::get('mud-vulcano/{id}/images', [MudVulcanoImageController::class, 'index'])->name('mud-vulcano.images');
    Route::get('mud-vulcano/{id}/images/create', [MudVulcanoImageController::class, 'create'])->name('mud-vulcano.images.create');
    Route::post('mud-vulcano/{id}/images', [MudVulcanoImageController::class, 'store'])->name('mud-vulcano.images.store');
    Route::delete('mud-vulcano/{id}/images', [MudVulcanoImageController::class, 'destroy'])->name('mud-vulcano.images.destroy');

    Route::resource('post', PostController::class);
    Route::put('post/publish/{id}', [PostController::class, 'publish'])->name('post.publish');
    Route::put('post/unpublish/{id}', [PostController::class, 'unpublish'])->name('post.unpublish');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::get('/lang/{locale}', [HomeController::class, 'lang'])->name('lang');

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/mud-vulcano', [FrontendController::class, 'mud_vulcano'])->name('mud-vulcano');
Route::get('/mud-vulcano-detail/{slug}', [FrontendController::class, 'mudvulcano_detail']);
Route::get('/post', [FrontendController::class, 'post'])->name('post');
Route::get('/post-detail/{slug}', [FrontendController::class, 'postdetail']);
// Route::get('/project-detail', [FrontendController::class, 'projectdetail']);
// Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
// Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');
Route::post('/search', [FrontendController::class, 'search']);

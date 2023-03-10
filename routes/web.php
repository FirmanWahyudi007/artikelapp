<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Backend\MudVulcanoController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('category', CategoryController::class);
Route::resource('users', UserController::class);
Route::resource('mud-vulcano', MudVulcanoController::class);
Route::resource('post', PostController::class);

Route::get('/', [FrontendController::class, 'index'])->name('home');
Route::get('/about', [FrontendController::class, 'about'])->name('about');
Route::get('/service', [FrontendController::class, 'service'])->name('service');
Route::get('/service-detail', [FrontendController::class, 'servicedetail']);
Route::get('/project', [FrontendController::class, 'project'])->name('project');
Route::get('/project-detail', [FrontendController::class, 'projectdetail']);
Route::get('/blog', [FrontendController::class, 'blog'])->name('blog');
Route::get('/blog-detail', [FrontendController::class, 'blogdetail']);
Route::get('/contact', [FrontendController::class, 'contact'])->name('contact');

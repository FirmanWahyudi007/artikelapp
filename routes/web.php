<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\MudVulcanoController;
use App\Http\Controllers\Backend\PostController;
use App\Http\Controllers\Backend\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::resource('category', CategoryController::class);
    Route::resource('users', UserController::class);
    Route::resource('mud-vulcano', MudVulcanoController::class);
    Route::resource('post', PostController::class);
    Route::put('post/publish/{id}', [PostController::class, 'publish'])->name('post.publish');
    Route::put('post/unpublish/{id}', [PostController::class, 'unpublish'])->name('post.unpublish');
});

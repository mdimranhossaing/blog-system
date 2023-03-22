<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Auth\LoginRegisterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// FORNTEND

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('blog/posts', [BlogController::class, 'index'])->name('blog.index');
Route::get('blog/posts/{post:slug}', [BlogController::class, 'show'])->name('blog.show');

Route::get('blog/category/{category:slug}', [CategoryController::class, 'index'])->name('blog.category.index');
Route::get('blog/user/{user:id}', [UserController::class, 'index'])->name('blog.user.index');

// BACKEND

// For Login Register
Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

// For Post
Route::resource('admin/posts', PostController::class);

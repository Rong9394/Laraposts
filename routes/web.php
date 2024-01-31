<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('posts');
Route::get('/view_post/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('view_post');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/create_post', [App\Http\Controllers\PostController::class, 'create'])->name('create_post');
    Route::post('/create_post', [App\Http\Controllers\PostController::class, 'store'])->name('create_post');
    Route::get('/edit_post/{post}', [App\Http\Controllers\PostController::class, 'edit'])->name('edit_post');
    Route::post('/edit_post/{post}', [App\Http\Controllers\PostController::class, 'update'])->name('edit_post');
    Route::get('/delete_post/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('delete_post');
    Route::get('/user/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');
});

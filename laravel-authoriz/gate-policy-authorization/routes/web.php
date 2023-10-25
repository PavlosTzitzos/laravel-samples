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

//Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate.index')->middleware('can:isUser');

Route::get('/gate', [App\Http\Controllers\AuthorizationController::class, 'index'])->name('gate.index');

Route::get('/posts', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');

Route::get('/posts/{post}', [App\Http\Controllers\PostController::class, 'show'])->name('post.show');//->middleware('can:view,post');

Route::get('/posts/delete/{post}', [App\Http\Controllers\PostController::class, 'destroy'])->name('post.delete')->middleware('can:delete,post');


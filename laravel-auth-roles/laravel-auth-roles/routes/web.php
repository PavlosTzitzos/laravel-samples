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

/* Section ADMIN */

Route::prefix('admin')->middleware('auth','isAdmin')->group(function(){
    // put here all routes for the admin eg :
    Route::get('/products',[AdminController::class,'adminGetAllProducts'])->name('admin.products');
    // do not forget to run : php artisan optimize
});

/* Section EDITOR */

/* Section USER */

/* Section Client */



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

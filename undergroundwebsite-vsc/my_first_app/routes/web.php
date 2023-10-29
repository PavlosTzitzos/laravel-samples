<?php

use Illuminate\Support\Facades\Route;

# import controllers :

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ProducerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthorizationController;


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

# No Auth routes availabe :

Route::get('/',[WelcomeController::class,'index'])->name('welcome');
Route::get('/producer',[WelcomeController::class,'producer'])->name('producer');
Route::get('/show',[WelcomeController::class,'show'])->name('show');
Route::get('/program',[WelcomeController::class,'program'])->name('program');
Route::get('/gefyra', function () {
    return view('gefyra');
});

Route::get('/about', function () {
    return view('about');
});

# Auth routes :

Auth::routes();

/*
To disable registration of new users :
https://devtonight.com/articles/how-to-disable-laravel-user-registration
*/
Auth::routes(['register' => false]);

# After log in :
Route::get('/home',[HomeController::class,'index'])->name('home.index');
Route::get('/home/current_show/{current_show}/edit',[HomeController::class,'edit'])->name('home.edit');
Route::put('/home/current_show/{current_show}/update',[HomeController::class,'update'])->name('home.update');

// Route::middleware(['auth','user-role:user'])->group(function()
// {
//     Route::get("/home",[HomeController::class,'userHome'])->name('home');
// });

// Route::middleware(['auth','user-role:editor'])->group(function()
// {
//     Route::get("/home",[HomeController::class,'editorHome'])->name('home');
// });

// Route::middleware(['auth','user-role:admin'])->group(function()
// {
//     Route::get("/home",[HomeController::class,'adminHome'])->name('home');
// });


# HTTP GET methods

Route::get('/home/program', [ProgramController::class,'index'])->name('program.index');
Route::get('/home/show', [ShowController::class,'index'])->name('show.index');
Route::get('/home/producer', [ProducerController::class,'index'])->name('producer.index');


Route::get('/home/show/create', [ShowController::class,'create'])->name('show.create')->middleware('can:create,show');
Route::get('/home/show/{show}/edit', [ShowController::class,'edit'])->name('show.edit')->middleware('auth');
Route::get('/home/show/{show}/delete', [ShowController::class,'delete'])->name('show.delete')->middleware('auth');

Route::get('/home/program/create', [ProgramController::class,'create'])->name('program.create')->middleware('auth');
Route::get('/home/program/{program}/edit', [ProgramController::class,'edit'])->name('program.edit')->middleware('auth');
Route::get('/home/program/{program}/delete', [ProgramController::class,'delete'])->name('program.delete')->middleware('auth');

Route::get('/home/producer/create', [ProducerController::class,'create'])->name('producer.create')->middleware('auth');
Route::get('/home/producer/{producer}/edit', [ProducerController::class,'edit'])->name('producer.edit')->middleware('auth');
Route::get('/home/producer/{producer}/delete', [ProducerController::class,'delete'])->name('producer.delete')->middleware('auth');

# HTTP POST methods :

Route::post('/home/show', [ShowController::class,'store'])->name('show.store')->middleware('auth');
Route::post('/home/program', [ProgramController::class,'store'])->name('program.store')->middleware('auth');
Route::post('/home/producer', [ProducerController::class,'store'])->name('producer.store')->middleware('auth');

# HTTP PUT methods :

Route::put('/home/show/{show}/update', [ShowController::class,'update'])->name('show.update')->middleware('auth');
Route::put('/home/program/{program}/update', [ProgramController::class,'update'])->name('program.update')->middleware('auth');
Route::put('/home/producer/{producer}/update', [ProducerController::class,'update'])->name('producer.update')->middleware('auth');

# HTTP DELETE methods :

Route::delete('/home/show/{show}/destroy', [ShowController::class,'destroy'])->name('show.destroy')->middleware('auth');
Route::delete('/home/program/{program}/destroy', [ProgramController::class,'destroy'])->name('program.destroy')->middleware('auth');
Route::delete('/home/producer/{producer}/destroy', [ProducerController::class,'destroy'])->name('producer.destroy')->middleware('auth');

# HTTP DELETE batch method for program :

Route::delete('/home/program', [ProgramController::class,'clear'])->name('program.clear')->middleware('auth');

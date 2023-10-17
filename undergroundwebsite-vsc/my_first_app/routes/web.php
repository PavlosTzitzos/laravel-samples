<?php

use Illuminate\Support\Facades\Route;

# import controllers :

use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\ProducerController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/program', [ProgramController::class,'index'])->name('program.index');

Route::get('/show', [ShowController::class,'index'])->name('show.index');

Route::get('/producer', [ProducerController::class,'index'])->name('producer.index');

# Auth routes :

Auth::routes();

Route::get('/home', 'ProgramsController@index')->name('home');

# HTTP GET methods

Route::get('/show/create', [ShowController::class,'create'])->name('show.create');
Route::get('/show/{show}/edit', [ShowController::class,'edit'])->name('show.edit');
Route::get('/show/{show}/delete', [ShowController::class,'delete'])->name('show.delete');

Route::get('/program/create', [ProgramController::class,'create'])->name('program.create');
Route::get('/program/{program}/edit', [ProgramController::class,'edit'])->name('program.edit');
Route::get('/program/{program}/delete', [ProgramController::class,'delete'])->name('program.delete');

Route::get('/producer/create', [ProducerController::class,'create'])->name('producer.create');
Route::get('/producer/{producer}/edit', [ProducerController::class,'edit'])->name('producer.edit');
Route::get('/producer/{producer}/delete', [ProducerController::class,'delete'])->name('producer.delete');

# HTTP POST methods :

Route::post('/show', [ShowController::class,'store'])->name('show.store');
Route::post('/program', [ProgramController::class,'store'])->name('program.store');
Route::post('/producer', [ProducerController::class,'store'])->name('producer.store');

# HTTP PUT methods :

Route::put('/show/{show}/update', [ShowController::class,'update'])->name('show.update');
Route::put('/program/{program}/update', [ProgramController::class,'update'])->name('program.update');
Route::put('/producer/{producer}/update', [ProducerController::class,'update'])->name('producer.update');




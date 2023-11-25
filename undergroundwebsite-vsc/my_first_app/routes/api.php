<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\ProducerController;
use App\Http\Controllers\Api\V1\ProgramController;
use App\Http\Controllers\Api\V1\ShowController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// url: api/v1
Route::group([
    'prefix'=>'v1',
    // 'middleware' => 'auth:api',// locked
],function(){
    // HTTP GET
    Route::get('producers', [ProducerController::class,'index']);
    Route::get('shows', [ShowController::class,'index']); // pivot table need to be updated with api
    Route::get('programs', [ProgramController::class,'index']);
    // HTTP GET
    Route::get('producers/{id}', [ProducerController::class,'show']);
    Route::get('shows/{id}', [ShowController::class,'show']); // pivot table need to be updated with api
    Route::get('programs/{id}', [ProgramController::class,'show']);
});

Route::group([
    'prefix'=>'v1',
    'middleware' => 'auth:api',// locked
],function(){
    //HTTP POST
    Route::post('producers',        [ProducerController::class,'store']);
    Route::post('shows',            [ShowController::class,'store']); // pivot table need to be updated with api
    Route::post('programs',         [ProgramController::class,'store']);
    // HTTP PUT
    Route::put('producers/{id}',    [ProducerController::class,'update']);
    Route::put('shows/{id}',        [ShowController::class,'update']); // pivot table need to be updated with api
    Route::put('programs/{id}',     [ProgramController::class,'update']);
    // HTTP PATCH
    Route::patch('producers/{id}',  [ProducerController::class,'update']);
    Route::patch('shows/{id}',      [ShowController::class,'update']); // pivot table need to be updated with api
    Route::patch('programs/{id}',   [ProgramController::class,'update']);
    // HTTP DELETE
    Route::delete('producers/{id}', [ProducerController::class,'destroy']);
    Route::delete('shows/{id}',     [ShowController::class,'destroy']); // pivot table need to be updated with api
    Route::delete('programs/{id}',  [ProgramController::class,'destroy']);

    // bulk delete does not work yet
    Route::delete('programs/clear', [ProgramController::class,'clear']);
});


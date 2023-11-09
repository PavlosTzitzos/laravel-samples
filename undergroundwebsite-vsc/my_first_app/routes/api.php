<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// url: api/v1
Route::group([
    'prefix'=>'v1',
    'namespace'=>'App\Http\Controllers\Api\V1',
    'middleware' => 'auth:sanctum',// locked
],function(){
    Route::apiResource('producers', ProducerController::class);
    Route::apiResource('shows', ShowController::class); // pivot table need to be updated with api
    Route::apiResource('programs', ProgramController::class);

    // bulk delete does not work yet
    Route::delete('programs/clear', [ProgramController::class,'clear']);
});


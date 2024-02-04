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

if(\Illuminate\Support\Facades\App::environment('local')){
    Route::get('/playground',function(){
        event(new \App\Events\ChatMessageEvent());
        // $url = URL::temporarySignedRoute('share-video', now()->addSecondds(30),[
        //     'video' => 123
        // ]);
        // return $url;
        return null;
    });

    Route::get('/ws', function(){
        return view('broadcast');
    });

    Route::post('/chat-message', function(\Illuminate\Http\Request $request){
        event(new \App\Events\ChatMessageEvent($request->message));
        return null;
    });
}



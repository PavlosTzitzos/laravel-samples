<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    
    /**
     * Show the loged in user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
    public function index()
    {
        return view('home');
    }
    */

    /**
     * Show the loged in user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    /*
    public function index($user)
    {
        dd($user); # gives a number
        return view('home');
    }
    */
    
    /**
     * Show the loged in user profile.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($user)
    {
        #\App\User::find($user); one way is this without phpstorm editor
        $user = User::find($user); 

        return view('home',[
            'user' => $user,
        ]);
    }
    
}

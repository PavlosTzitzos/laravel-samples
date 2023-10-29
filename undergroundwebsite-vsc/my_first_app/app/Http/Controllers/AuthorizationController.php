<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthorizationController extends Controller
{
    //
    public function index()
    {
        //return "it worked for user";
        Gate::allows('isAdmin') ? Response::allow() : abort(403);
        return "Authorization";
    }
}

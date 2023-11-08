<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Producer;
use App\Models\Show;
use App\Models\CurrentShow;
use App\Models\NextShow;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        try{
            $current_show = CurrentShow::find(1);
            $current_show_details = Show::find($current_show->show_id);
            //dd($current_show); // for debugging
            
            $next_show = NextShow::find(1);
            $next_show_details = Show::find($next_show->show_id);
            //dd($next_show); // for debugging
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        
        return view('welcome',['current_show' => $current_show_details,'next_show' => $next_show_details]);
    }

    public function show()
    {
        try{
            $shows = Show::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('show',['shows' => $shows]);
    }
    public function program()
    {
        try{
            $programs = Program::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program',['programs' => $programs]);
    }
    public function producer()
    {
        try{
            $producers = Producer::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('producer',['producers' => $producers]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Producer;
use App\Models\Show;
use App\Models\CurrentShow;

class WelcomeController extends Controller
{
    //
    public function index()
    {

        $current_show = CurrentShow::all();
        $data = $current_show->where('priority','=',0);
        foreach($data as $dt)
        {
            $priority_0 = $dt->show_id;
        }
        $current_show = Show::find($priority_0);
        
        //dd($current_show); // for debugging
        
        return view('welcome',['current_show' => $current_show]);
    }

    public function show()
    {
        $shows = Show::all();
        return view('show',['shows' => $shows]);
    }
    public function program()
    {
        $programs = Program::all();
        return view('program',['programs' => $programs]);
    }
    public function producer()
    {
        $producers = Producer::all();
        return view('producer',['producers' => $producers]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CurrentShow;
use App\Models\NextShow;
use App\Models\Show;
use App\Models\Program;
use Carbon\Carbon; // used to get current time

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(CurrentShow::exists())
        {
            $current_show = CurrentShow::find(1);
        }else{
            $current_show = new CurrentShow(['show_id'=>1]);
            $current_show->save();
        }
        $current_show_details = Show::find($current_show->show_id);
        
        // dd($current_show_details); // for debugging
        
        return view('home.index',['current_show_details' => $current_show_details]);
    }
    public function edit(CurrentShow $current_show)
    {
        // dd($current_show);
        $shows = Show::all();
        return view('home.edit',['current_show' => $current_show,'shows' => $shows]);
    }
    public function update(CurrentShow $current_show , Request $request)
    {
        
        //dd($request); // for debugging
        
        $data = $request->validate([
            'show_id' => 'required',
        ]);

        // current_show_calc();

        $current_show->update($data);
        return redirect(route('home.index'))->with('success','Current Show On Air !!');
    }

    /**
     * This function finds the current show and next show based on the current time and the times in the program table.
     * If empty table is found it puts the underground playlist.
     * If no show is found as a current or next one it just puts the underground playlist
     */
    public function next_show_calc()
    {
        // Step 1: Get current time
        $currentDateTime = Carbon::now();
        $currentDay = $currentDateTime->format('l');

        // check in program table the current show
        $shows_of_today = Program::where('program_weekday',$currentDay);

        if($shows_of_today!= null)
        {
            $next_show_ids = $shows_of_today->where('show_start_time','<=', $currentDateTime);
            return 1;
        }else{
            return 0;
        }
        dd($next_show_ids);
        // choose the id whose start time is near the current time

        // put this show in the next_show table
        $next_show->update($next_show_id);
        // find the next show and put it in the current_show table with priority 1
    }
}

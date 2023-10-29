<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Show;
use Carbon\Carbon; // used to get current time

class ProgramController extends Controller
{
    public function index()
    {
        //return view('program.index');
        $programs = Program::all();

        return view('program.index',['programs' => $programs]);
    }

    public function create()
    {
        $this->authorize('can:create');
        $shows = Show::all();
        return view('program.create',['shows' => $shows]);
    }

    public function edit(Program $program)
    {
        $this->authorize('can:view',$program);
        //dd($program); # for debugging
        $shows = Show::all();
        return view('program.edit',['program'=>$program , 'shows' => $shows]);
    }

    public function delete(Program $program)
    {
        $this->authorize('can:delete',$program);
        return view('program.delete',['program'=>$program]);
    }

    public function destroy(Program $program)
    {
        $this->authorize('can:forceDelete',$program);
        $program->delete();

        return redirect(route('program.index'))->with('success','Pprogram Deleted Successfully');
    }
    
    public function store(Request $request)
    {
        //dd($request); // for debugging
        $data = $request->validate([
            'program_weekday' => 'required',
            'show_start_time' => 'required',
            'show_end_time' => 'required',
            'show_id' => 'required'
        ]);

        $program = Program::create($data);

        // call the function current_show_calc 
        //current_show_calc();

        return redirect(route('program.index'))->with('success','Program Created Successfully');
    }

    public function update(Program $program, Request $request)
    {
        $this->authorize('can:update',$program);
        //dd($request); # for debugging
        $data = $request->validate([
            'program_weekday' => 'required',
            'show_start_time' => 'required',
            'show_end_time' => 'required',
            'show_id' => 'required'
        ]);

        $program->update($data);

        // call the function current_show_calc 
        //current_show_calc();
        
        return redirect(route('program.index'))->with('success','Program Updated Successfully');
    }

    public function clear()
    {
        $this->authorize('can:forceDelete',$program);
        Program::all()->delete();

        return redirect(route('program.index'))->with('success','Program Cleared Successfully');
    }

    /**
     * This function finds the current show and next show based on the current time and the times in the program table.
     * If empty table is found it puts the underground playlist.
     * If no show is found as a current or next one it just puts the underground playlist
     */
    public function current_show_calc()
    {
        // Get current time
        $currentDateTime = Carbon::now();
        $currentDay = $currentDateTime->format('l');

        // check in program table the current show
        $shows_of_today = Program::where('program_weekday',$currentDay);

        if($shows_of_today!= null)
        {
            $current_show_id = $shows_of_today->where('show_start_time','<=', $currentDateTime);
            return 1;
        }else{
            return 0;
        }
        // put this show in the current_show table with priority 0
        // find the next show and put it in the current_show table with priority 1
    }
}

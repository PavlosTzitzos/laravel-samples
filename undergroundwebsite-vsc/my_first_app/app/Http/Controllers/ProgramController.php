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
        $this->authorize('viewAny',Program::class);
        $programs = Program::all();
        return view('program.index',['programs' => $programs]);
    }

    public function show(Program $program)
    {
        $this->authorize('view',$program);
        //dd($producer); // for debugging
        return view('program.show',['program'=>$program]);
    }

    public function create()
    {
        $this->authorize('create',Program::class);
        $shows = Show::all();
        return view('program.create',['shows'=>$shows]);
    }

    public function store(Request $request)
    {
        $this->authorize('create',Program::class);
        //dd($request); // for debugging
        $data = $request->validate([
            'program_weekday' => 'required',
            'show_start_time' => 'required',
            'show_end_time' => 'required',
            'show_id' => 'required'
        ]);

        $program = Program::create($data);

        return redirect(route('program.index'))->with('success','Program Created Successfully');
    }

    public function edit(Program $program)
    {
        $this->authorize('update',$program);
        //dd($program); // for debugging
        $shows = Show::all();
        return view('program.edit',['program'=>$program , 'shows' => $shows]);
    }

    public function update(Program $program, Request $request)
    {
        $this->authorize('update',$program);
        //dd($request); // for debugging
        $data = $request->validate([
            'program_weekday' => 'required',
            'show_start_time' => 'required',
            'show_end_time' => 'required',
            'show_id' => 'required'
        ]);

        $program->update($data);
        
        return redirect(route('program.index'))->with('success','Program Updated Successfully');
    }

    public function delete(Program $program)
    {
        $this->authorize('delete',$program);
        return view('program.delete',['program'=>$program]);
    }

    public function destroy(Program $program)
    {
        $this->authorize('delete',$program);
        $program->delete();

        return redirect(route('program.index'))->with('success','Pprogram Deleted Successfully');
    }

    public function clear()
    {
        $this->authorize('empty',Program::class);
        $programs = Program::all();
        return view('program.clear',['programs' => $programs]);
    }
    
    public function empty()
    {
        $this->authorize('empty',Program::class);
        Program::truncate();
        return redirect(route('program.index'))->with('success','Program Cleared Successfully');
    }

}

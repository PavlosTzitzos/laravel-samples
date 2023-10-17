<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;

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
        return view('program.create');
    }

    public function edit(Program $program)
    {
        //dd($program); # for debugging
        return view('program.edit',['program'=>$program]);
    }

    public function delete(Program $program)
    {
        return view('program.delete',['program'=>$program]);
    }

    public function destroy(Program $program)
    {
        $program->delete();

        return redirect(route('program.index'))->with('success','Pprogram Deleted Successfully');
    }
    
    public function store(Request $request)
    {
        //dd($request); # for debugging
        $data = $request->validate([
            'program_weekday' => 'required',
            'show_start_time' => 'required',
            'show_end_time' => 'required',
            'show_id' => 'required'
        ]);

        $program = Program::create($data);

        return redirect(route('program.index'))->with('success','Program Created Successfully');
    }

    public function update(Program $program, Request $request)
    {
        //dd($request); # for debugging
        $data = $request->validate([
            'program_weekday' => 'required',
            'show_start_time' => 'required',
            'show_end_time' => 'required',
            'show_id' => 'required'
        ]);

        $program->update($data);

        return redirect(route('program.index'))->with('success','Program Updated Successfully');
    }

    public function clear()
    {
        Program::all()->delete();

        return redirect(route('program.index'))->with('success','Program Cleared Successfully');
    }
}

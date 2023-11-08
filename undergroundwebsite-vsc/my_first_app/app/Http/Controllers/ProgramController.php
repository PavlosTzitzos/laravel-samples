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
        try{
            $this->authorize('viewAny',Program::class);
            $programs = Program::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program.index',['programs' => $programs]);
    }

    public function show(Program $program)
    {
        try{
            $this->authorize('view',$program);
            //dd($producer); // for debugging
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program.show',['program'=>$program]);
    }

    public function create()
    {
        try{
            $this->authorize('create',Program::class);
            $shows = Show::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program.create',['shows'=>$shows]);
    }

    public function store(Request $request)
    {
        try{
            $this->authorize('create',Program::class);
            //dd($request); // for debugging
            $data = $request->validate([
                'program_weekday' => 'required',
                'show_start_time' => 'required',
                'show_end_time' => 'required',
                'show_id' => 'required'
            ]);

            $program = Program::create($data);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('program.index'))->with('success','Program Created Successfully');
    }

    public function edit(Program $program)
    {
        try{
            $this->authorize('update',$program);
            //dd($program); // for debugging
            $shows = Show::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program.edit',['program'=>$program , 'shows' => $shows]);
    }

    public function update(Program $program, Request $request)
    {
        try{
            $this->authorize('update',$program);
            //dd($request); // for debugging
            $data = $request->validate([
                'program_weekday' => 'required',
                'show_start_time' => 'required',
                'show_end_time' => 'required',
                'show_id' => 'required'
            ]);

            $program->update($data);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        
        return redirect(route('program.index'))->with('success','Program Updated Successfully');
    }

    public function delete(Program $program)
    {
        try{
            $this->authorize('delete',$program);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program.delete',['program'=>$program]);
    }

    public function destroy(Program $program)
    {
        try{
            $this->authorize('delete',$program);
            $program->delete();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('program.index'))->with('success','Pprogram Deleted Successfully');
    }

    public function clear()
    {
        try{
            $this->authorize('empty',Program::class);
            $programs = Program::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program.clear',['programs' => $programs]);
    }
    
    public function empty()
    {
        try{
            $this->authorize('empty',Program::class);
            Program::truncate();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return redirect(route('program.index'))->with('success','Program Cleared Successfully');
    }

}

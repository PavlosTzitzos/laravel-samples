<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Program;
use App\Models\Show;
use Carbon\Carbon; // used to get current time
use App\Http\Requests\ProgramFormRequest;

class ProgramController extends Controller
{
    /**
     * Returns all program slots and it's details
     * Auth / exceptions handle
     * HTTP GET method
     */
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

    /**
     * Returns the program slot , it's details
     * Auth / exceptions handle
     * HTTP GET method
     */
    public function show(Program $program)
    {
        try{
            $this->authorize('view',$program);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program.show',['program'=>$program]);
    }

    /**
     * Create a new program slot 
     * Auth / exceptions handle
     * HTTP GET method
     */
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

    /**
     * Create a new program slot
     * Auth / exceptions handle
     * HTTP POST method
     */
    public function store(ProgramFormRequest $request)
    {
        try{
            $this->authorize('create',Program::class);
            //dd($request); // for debugging
            $data = $request->validated();

            $program = Program::create($data);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('program.index'))->with('success','Program Created Successfully');
    }

    /**
     * Update a program
     * Auth / exceptions handle
     * HTTP GET method
     */
    public function edit(Program $program)
    {
        try{
            $this->authorize('update',$program);
            $shows = Show::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('program.edit',['program'=>$program , 'shows' => $shows]);
    }

    /**
     * Update a program slot
     * Auth / exceptions handle
     * HTTP POST method
     */
    public function update(Program $program, ProgramFormRequest $request)
    {
        try{
            $this->authorize('update',$program);
            $data = $request->validated();

            $program->update($data);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        
        return redirect(route('program.index'))->with('success','Program Updated Successfully');
    }

    /**
     * Delete a program slot
     * Auth / exceptions handle
     * HTTP GET method
     */
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

    /**
     * Delete a program slot
     * Auth / exceptions handle
     * HTTP DELETE method
     */
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

    /**
     * Delete all program slots
     * Auth / exceptions handle
     * HTTP GET method
     */
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
    
    /**
     * Delete all program slots
     * Auth / exceptions handle
     * HTTP DELETE method
     */
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

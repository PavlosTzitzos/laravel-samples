<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Producer;

class ShowController extends Controller
{
    public function index()
    {
        try{
            $this->authorize('viewAny',Program::class);
            $shows = Show::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('show.index',['shows' => $shows]);
    }

    public function show(Show $show)
    {
        try{
            $this->authorize('view',$show);
            //dd($producer); // for debugging
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('show.show',['show'=>$show]);
    }

    public function create()
    {
        try{
            $this->authorize('create',Show::class);
            $producers = Producer::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('show.create',['producers' => $producers]);
    }

    public function store(Request $request)
    {
        try{
            $this->authorize('create',Show::class);
            // dd($request); // for debugging
            
            //Step 1 : validations
            $data = $request->validate([
                'show_name' => 'required',
                'show_description' => 'nullable',
                //'show_logo' => 'nullable|mimes:jpeg,jpg,png,gif'
                'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
                'producer_ids' => 'required|array|min:1',
                'producer_ids.*' => 'required|distinct|max:4',
            ]);

            // Step 2: Save Data like name , time , description
            $show = Show::create($data);
            
            // Step 3: Upload Image and Save Image Name
            if($request->file('show_logo'))
            {
                $file = $request->file('show_logo');
                $file_path = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/showlogos'), $file_path);
                $show['show_logo'] = $file_path;
            }

            $show->save();

            // Step 4 : Save the relationship
            /*
            * The relationship producer_ids must be saved after the show is saved .
            * The reason for this is that laravel needs the show_id to know what id to insert in the pivot table .
            */
            $producer_ids = $request->input('producer_ids');
            //dd($producer_ids); //used for debugging
            $show->producers()->attach($producer_ids);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('show.index'))->with('success','Show Created Successfully');
    }

    public function edit(Show $show)
    {
        try{
            //dd($show); // for debugging
            //dd($show->producers);

            $this->authorize('update',$show);
            $old_producers = $show->producers;
            $all_producers = Producer::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('show.edit',['show'=>$show,'old_producers'=>$old_producers,'all_producers'=>$all_producers]);
    }

    public function update(Show $show, Request $request)
    {
        try{
            $this->authorize('update',$show);
            //dd($request); // for debugging
            
            //Step 1 : validations
            $data = $request->validate([
                'show_name' => 'required',
                'show_description' => 'nullable',
                //'show_logo' => 'nullable|mimes:jpeg,jpg,png,gif'
                'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
                'producer_ids' => 'required|array|min:1',
                'producer_ids.*' => 'required|distinct|max:4',
            ]);

            $show->update($data);

            // Step 3: Upload Image and Save Image Name
            if($request->file('show_logo'))
            {
                $file = $request->file('show_logo');
                $file_path = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/showlogos'), $file_path);
                $show['show_logo'] = $file_path;
            }

            $show->save();

            $new_producers = $request->producer_ids;

            $show->producers()->sync($new_producers);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('show.index'))->with('success','Show Updated Successfully');
    }

    public function delete(Show $show)
    {
        try{
            $this->authorize('delete',$show);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('show.delete',['show'=>$show]);
    }

    public function destroy(Show $show)
    {
        try{
            $this->authorize('delete',$show);
            $show->delete();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('show.index'))->with('success','Show Deleted Successfully');
    }
    
}

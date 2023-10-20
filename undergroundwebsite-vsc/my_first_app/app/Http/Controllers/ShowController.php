<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;

class ShowController extends Controller
{
    public function index()
    {
        //return view('show.index');
        $shows = Show::all();
        return view('show.index',['shows' => $shows]);
    }

    public function create()
    {
        $producers = Show::all();
        return view('show.create',['available_producers']);
    }

    public function edit(Show $show)
    {
        //dd($show); # for debugging
        return view('show.edit',['show'=>$show]);
    }

    public function delete(Show $show)
    {
        return view('show.delete',['show'=>$show]);
    }

    public function destroy(Show $show)
    {
        $show->delete();

        return redirect(route('show.index'))->with('success','Show Deleted Successfully');
    }
    
    public function store(Request $request)
    {
        //dd($request); # for debugging
        
        //Step 1 : validations
        $data = $request->validate([
            'show_name' => 'required',
            'show_description' => 'nullable',
            //'show_logo' => 'nullable|mimes:jpeg,jpg,png,gif'
            'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        // Step 2: Save Data like name , time , description
        $show = Show::create($data);
        
        // Step 3: Upload Image and Save Image Name
        if($request->file('show_logo'))
        {
            $file = $request->file('show_logo');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('public/showlogos'), $filename);
            $show['show_logo'] = $filename;
        }

        // Step 4 : Save the relationship
        $producers = $request->input('producers');
        
        $show->producers()->attach($producers);

        // Return
        return redirect(route('show.index'))->with('success','Show Created Successfully');
    }

    public function update(Show $show, Request $request)
    {
        //dd($request); # for debugging
        $data = $request->validate([
            'show_name' => 'required',
            'show_description' => 'nullable',
            'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048'
        ]);

        $show->update($data);

        return redirect(route('show.index'))->with('success','Show Updated Successfully');
    }
}

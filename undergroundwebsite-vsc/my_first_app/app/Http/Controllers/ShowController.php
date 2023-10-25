<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Show;
use App\Models\Producer;

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
        if (Auth::check()) {
            // The user is logged in...
            $producers = Producer::all();
            return view('show.create',['producers' => $producers]);
        } else {
            return view('show.index');
        }
    }

    public function edit(Show $show)
    {
        //dd($show); // for debugging
        //dd($show->producers);

        $old_producers = $show->producers;
        $all_producers = Producer::all();
        return view('show.edit',['show'=>$show,'old_producers'=>$old_producers,'all_producers'=>$all_producers]);
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

        // if ($validation->fails()) {
        //     return Response::make(['error' => $validation->errors()], 400);
        // }

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
        /*
         * The relationship producer_ids must be saved after the show is saved .
         * The reason for this is that laravel needs the show_id to know what id to insert in the pivot table .
         */
        $producer_ids = $request->input('producer_ids');
        //dd($producer_ids); //used for debugging
        $show->producers()->attach($producer_ids);

        // Return
        return redirect(route('show.index'))->with('success','Show Created Successfully');
    }

    public function update(Show $show, Request $request)
    {
        //dd($request); # for debugging
        $data = $request->validate([
            'show_name' => 'required',
            'show_description' => 'nullable',
            'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'producer_ids' => 'required|array|min:1',
            'producer_ids.*' => 'required|distinct|max:4',
        ]);

        // if ($validation->fails()) {
        //     return Response::make(['error' => $validation->errors()], 400);
        // }

        $show->update($data);

        $new_producers = $request->producer_ids;

        $show->producers()->sync($new_producers);

        return redirect(route('show.index'))->with('success','Show Updated Successfully');
    }
}

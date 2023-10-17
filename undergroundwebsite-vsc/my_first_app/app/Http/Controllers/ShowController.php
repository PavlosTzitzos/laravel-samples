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
        return view('show.create');
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
        $data = $request->validate([
            'show_name' => 'required',
            'show_description' => 'nullable',
            'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        $producers = $request->input('producers');
        
        $show = Show::create($data);

        $show->producers()->attach($producers);

        return redirect(route('show.index'))->with('success','Show Created Successfully');
    }

    public function update(Show $show, Request $request)
    {
        //dd($request); # for debugging
        $data = $request->validate([
            'show_name' => 'required',
            'show_description' => 'nullable',
            'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        $show->update($data);

        return redirect(route('show.index'))->with('success','Show Updated Successfully');
    }
}

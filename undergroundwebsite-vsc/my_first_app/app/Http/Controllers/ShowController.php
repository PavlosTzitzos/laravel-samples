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

    public function delete()
    {
        return view('show.delete');
    }
    
    public function store(Request $request)
    {
        //dd($request); # for debugging
        $data = $request->validate([
            'show_name' => 'required',
            'show_description' => 'nullable',
            'show_logo' => 'nullable|image|mimes:jpeg,jpg,png,gif'
        ]);

        $show = Show::create($data);

        return redirect(route('show.index'));
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;

class ProducerController extends Controller
{
    public function index()
    {
        //return view('producer.index');
        $producers = Producer::all();
        return view('producer.index',['producers' => $producers]);
    }

    public function create()
    {
        return view('producer.create');
    }

    public function edit(Producer $producer)
    {
        //dd($producer); # for debugging
        return view('producer.edit',['producer'=>$producer]);
    }

    public function delete(Producer $producer)
    {
        return view('producer.delete',['producer'=>$producer]);
    }

    public function destroy(Producer $producer)
    {
        $producer->delete();

        return redirect(route('producer.index'))->with('success','Producer Deleted Successfully');
    }
    
    public function store(Request $request)
    {
        //dd($request); # for debugging
        $data = $request->validate([
            'first_name' => 'required',
            'second_name' => 'nullable',
            'last_name' => 'required',
            'phone_number' => 'nullable|numeric',
            'email' => 'nullable'
        ]);

        $producer = Producer::create($data);

        return redirect(route('producer.index'))->with('success','Producer Created Successfully');
    }

    public function update(Producer $producer, Request $request)
    {
        //dd($request); # for debugging
        $data = $request->validate([
            'first_name' => 'required',
            'second_name' => 'nullable',
            'last_name' => 'required',
            'phone_number' => 'nullable|numeric',
            'email' => 'nullable'
        ]);

        $producer->update($data);

        return redirect(route('producer.index'))->with('success','Producer Updated Successfully');
    }
}

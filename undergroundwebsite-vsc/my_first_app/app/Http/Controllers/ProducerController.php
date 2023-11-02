<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;

class ProducerController extends Controller
{
    /**
     * Index View -> Index Function -> HTTP GET producers
     */
    public function index()
    {
        $this->authorize('viewAny',Producer::class);
        $producers = Producer::all();
        return view('producer.index',['producers' => $producers]);
    }

    public function show(Producer $producer)
    {
        $this->authorize('view',$producer);
        //dd($producer); // for debugging
        return view('producer.show',['producer'=>$producer]);
    }

    public function create()
    {
        $this->authorize('create',Producer::class);
        return view('producer.create');
    }

    public function store(Request $request)
    {
        $this->authorize('create',Producer::class);
        //dd($request); // for debugging
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

    public function edit(Producer $producer)
    {
        $this->authorize('update',$producer);
        //dd($producer); // for debugging
        return view('producer.edit',['producer'=>$producer]);
    }

    public function update(Producer $producer, Request $request)
    {
        $this->authorize('update',$producer);
        //dd($request); // for debugging
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

    public function delete(Producer $producer)
    {
        $this->authorize('delete',$producer);
        return view('producer.delete',['producer'=>$producer]);
    }

    public function destroy(Producer $producer)
    {
        $this->authorize('delete',$producer);
        $producer->delete();

        return redirect(route('producer.index'))->with('success','Producer Deleted Successfully');
    }
}

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
        try{
            $this->authorize('viewAny',Producer::class);
            $producers = Producer::all();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('producer.index',['producers' => $producers]);
    }

    public function show(Producer $producer)
    {
        try{
            $this->authorize('view',$producer);
            //dd($producer); // for debugging
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('producer.show',['producer'=>$producer]);
    }

    public function create()
    {
        try{
            $this->authorize('create',Producer::class);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('producer.create');
    }

    public function store(Request $request)
    {
        try{
            $this->authorize('create',Producer::class);
            //dd($request); // for debugging
            $data = $request->validate([
                'first_name' => 'required',
                'second_name' => 'nullable',
                'last_name' => 'required',
                'phone_number' => 'nullable|numeric',
                'email' => 'nullable',
                'producer_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);

            $producer = Producer::create($data);

            if($request->file('producer_image'))
            {
                $file = $request->file('producer_image');
                $file_path = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/producerImages'), $file_path);
                $producer['producer_image'] = $file_path;
            }
            $producer->save();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('producer.index'))->with('success','Producer Created Successfully');
    }

    public function edit(Producer $producer)
    {
        try{
            $this->authorize('update',$producer);
            //dd($producer); // for debugging
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('producer.edit',['producer'=>$producer]);
    }

    public function update(Producer $producer, Request $request)
    {
        try{
            $this->authorize('update',$producer);
            //dd($request); // for debugging
            $data = $request->validate([
                'first_name' => 'required',
                'second_name' => 'nullable',
                'last_name' => 'required',
                'phone_number' => 'nullable|numeric',
                'email' => 'nullable',
                'producer_image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            ]);

            $producer->update($data);

            // Step 3: Upload Image and Save Image Name
            if($request->file('producer_image'))
            {
                $file = $request->file('producer_image');
                $file_path = date('YmdHi').$file->getClientOriginalName();
                $file->move(public_path('public/producerimage'), $file_path);
                $producer['producer_image'] = $file_path;
            }

            $producer->save();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('producer.index'))->with('success','Producer Updated Successfully');
    }

    public function delete(Producer $producer)
    {
        try{
            $this->authorize('delete',$producer);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('producer.delete',['producer'=>$producer]);
    }

    public function destroy(Producer $producer)
    {
        try{
            $this->authorize('delete',$producer);
            $producer->delete();
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }

        return redirect(route('producer.index'))->with('success','Producer Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producer;
use App\Http\Requests\ProducerFormRequest;

class ProducerController extends Controller
{
    /**
     * Returns all producers and it's details
     * Auth / exceptions handle
     * HTTP GET method
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

    /**
     * Returns the producer , it's details
     * Auth / exceptions handle
     * HTTP GET method
     */
    public function show(Producer $producer)
    {
        try{
            $this->authorize('view',$producer);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('producer.show',['producer'=>$producer]);
    }

    /**
     * Create a new producer
     * Auth / exceptions handle
     * HTTP GET method
     */
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

    /**
     * Create a new producer
     * Auth / exceptions handle
     * HTTP POST method
     */
    public function store(ProducerFormRequest $request)
    {
        try{
            $this->authorize('create',Producer::class);
            
            $data = $request->validated();

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

    /**
     * Update a producer
     * Auth / exceptions handle
     * HTTP GET method
     */
    public function edit(Producer $producer)
    {
        try{
            $this->authorize('update',$producer);
        }
        catch(exception $e){
            // handle the exception
            return back()->withError($exception->getMessage())->withInput();
        }
        return view('producer.edit',['producer'=>$producer]);
    }

    /**
     * Update a producer
     * Auth / exceptions handle
     * HTTP POST method
     */
    public function update(Producer $producer, ProducerFormRequest $request)
    {
        try{
            $this->authorize('update',$producer);
            
            $data = $request->validated();

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

    /**
     * Delete a producer
     * Auth / exceptions handle
     * HTTP GET method
     */
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

    /**
     * Delete a producer
     * Auth / exceptions handle
     * HTTP DELETE method
     */
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

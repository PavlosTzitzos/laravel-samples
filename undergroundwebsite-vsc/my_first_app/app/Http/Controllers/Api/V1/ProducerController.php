<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Producer;
use App\Http\Requests\V1\ProducerFormRequest;
use App\Http\Resources\V1\ProducerResource;
use App\Http\Resources\V1\ProducerCollection;

class ProducerController extends Controller
{
    /**
     * Returns all producers and it's details
     * HTTP GET method
     */
    public function index()
    {
        $this->authorize('viewAny',Producer::class);
        return new ProducerCollection(Producer::paginate());
    }

    /**
     * Returns a JSON with the producer , it's details
     * with the show_id
     * api/v1/shows/2
     * HTTP GET method
     */
    public function show(Producer $producer)
    {
        $this->authorize('view',$producer);
        return new ProducerResource($producer);
    }

    /**
     * Create a new producer
     * HTTP POST method
     */
    public function store(ProducerFormRequest $request)
    {
        return new ProducerResource(Producer::create($request->all()));
    }

    /**
     * Update a producer
     * HTTP PUT or PATCH method
     */
    public function update(Producer $producer, ProducerFormRequest $request)
    {
        $producer->update($request->all());
    }

    /**
     * Delete a producer
     * HTTP DELETE method
     */
    public function destroy(Producer $producer)
    {
        $this->authorize('delete',$producer);
        $producer->delete();
    }

}

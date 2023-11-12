<?php

namespace App\Repositories;

use App\Models\Producer;
use App\Http\Resources\V1\ProducerResource;
use App\Http\Resources\V1\ProducerCollection;
use App\Http\Requests\V1\ProducerFormRequest;
use App\Interfaces\ProducerInterface;
use Illuminate\Contracts\Pagination\Paginator;

class ProducerRepository implements ProducerInterface
{
    public function getAll(): ProducerCollection
    {
        // Queries against DB go here using Eloquent ORM which uses Repository Pattern
        // return Producer::get();
        // return Producer::paginate(10);
        return new ProducerCollection(Producer::paginate());
    }

    public function getById(int $id) : ProducerResource
    {
        // return Producer::find($id);
        return new ProducerResource(Producer::find($id));
    }

    public function addNew(ProducerFormRequest $request) : ProducerResource
    {
        return new ProducerResource(Producer::create($request->all()));
    }

    public function edit(int $id, ProducerFormRequest $request) : ProducerResource
    {
        $producer = Producer::find($id);
        $producer->update($request->all());
        return new ProducerResource(Producer::find($id));
    }

    public function delete(int $id) : ProducerResource
    {
        $producer = Producer::find($id);
        $producer->delete();
        return new ProducerResource($producer);
    }
}

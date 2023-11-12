<?php

namespace App\Repositories;

use App\Models\Show;
use App\Http\Resources\V1\ShowResource;
use App\Http\Resources\V1\ShowCollection;
use App\Http\Requests\V1\ShowFormRequest;
use App\Interfaces\ShowInterface;
use Illuminate\Contracts\Pagination\Paginator;

class ShowRepository implements ShowInterface
{
    public function getAll(): ShowCollection
    {
        // Queries against DB go here using Eloquent ORM which uses Repository Pattern
        // return Show::get();
        // return Show::paginate(10);
        return new ShowCollection(Show::paginate());
    }

    public function getById(int $id) : ShowResource
    {
        // return Show::find($id);
        return new ShowResource(Show::find($id));
    }

    public function addNew(ShowFormRequest $request) : ShowResource
    {
        return new ShowResource(Show::create($request->all()));
    }

    public function edit(int $id, ShowFormRequest $request) : ShowResource
    {
        $show = Show::find($id);
        $show->update($request->all());
        return new ShowResource(Show::find($id));
    }

    public function delete(int $id) : ShowResource
    {
        $show = Show::find($id);
        $show->delete();
        return new ShowResource($show);
    }
}

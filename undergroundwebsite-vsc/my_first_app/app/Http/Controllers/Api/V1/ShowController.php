<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Show;
use App\Models\Producer;
use App\Http\Requests\V1\ShowFormRequest;
use App\Http\Resources\V1\ShowResource;
use App\Http\Resources\V1\ShowCollection;

class ShowController extends Controller
{
    /**
     * Returns all shows and it's details
     */
    public function index()
    {
        $this->authorize('viewAny',Program::class);
        return new ShowCollection(Show::paginate());
    }

    /**
     * Returns a JSON with the show , it's details and it's producers
     * Usage :
     * api/v1/shows/2?includeProducers=true
     * OR
     * api/v1/shows/2
     */
    public function show(Show $show)
    {
        $this->authorize('view',$show);
        $includeProducers = request()->query('includeProducers');
        if($includeProducers)
        {
            return new ShowResource($show->loadMissing('producers'));
        }
        return new ShowResource($show);
    }

    /**
     * Create a new Show
     */
    public function store(ShowFormRequest $request)
    {
        return new ShowResource(Show::create($request->all()));
    }

    /**
     * Update a show
     */
    public function update(Show $show, ShowFormRequest $request)
    {
        $show->update($request->all());
    }

    /**
     * Delete a show
     */
    public function destroy(Show $show)
    {
        $this->authorize('delete',$show);
        $show->delete();
    }
}

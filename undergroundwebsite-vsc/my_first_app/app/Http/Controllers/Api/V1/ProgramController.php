<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Show;
use App\Http\Requests\V1\ProgramFormRequest;
use App\Http\Resources\V1\ProgramResource;
use App\Http\Resources\V1\ProgramCollection;

class ProgramController extends Controller
{
    /**
     * Returns all programs and it's details
     */
    public function index()
    {
        $this->authorize('viewAny',Program::class);
        return new ProgramCollection(Program::paginate());
    }

    /**
     * Returns a JSON with the program , it's details
     * with the show_id
     * api/v1/shows/2
     */
    public function show(Program $program)
    {
        $this->authorize('view',$program);
        return new ProgramResource($program);
    }

    /**
     * Create a new program
     */
    public function store(ProgramFormRequest $request)
    {
        return new ProgramResource(Program::create($request->all()));
    }

    /**
     * Update a program
     */
    public function update(Program $program, ProgramFormRequest $request)
    {
        $program->update($request->all());
    }

    /**
     * Delete a program
     */
    public function destroy(Program $program)
    {
        $this->authorize('delete',$program);
        $program->delete();
    }

    /**
     * Delete all programs
     */
    public function clear()
    {
        $this->authorize('empty',Program::class);
        Program::truncate();
    }

}

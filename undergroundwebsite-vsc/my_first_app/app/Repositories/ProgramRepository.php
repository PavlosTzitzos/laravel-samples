<?php

namespace App\Repositories;

use App\Models\Program;
use App\Http\Resources\V1\ProgramResource;
use App\Http\Resources\V1\ProgramCollection;
use App\Http\Requests\V1\ProgramFormRequest;
use App\Interfaces\ProgramInterface;
use Illuminate\Contracts\Pagination\Paginator;

class ProgramRepository implements ProgramInterface
{
    public function getAll() : ProgramCollection
    {
        // Queries against DB go here using Eloquent ORM which uses Repository Pattern
        // return Program::get();
        // return Program::paginate(10);
        return new ProgramCollection(Program::paginate());
    }

    public function getById(int $id) : ProgramResource
    {
        // return Program::find($id);
        return new ProgramResource(Program::find($id));
    }

    public function addNew(ProgramFormRequest $request) : ProgramResource
    {
        return new ProgramResource(Program::create($request->all()));
    }

    public function edit(int $id, ProgramFormRequest $request) : ProgramResource
    {
        $program = Program::find($id);
        $program->update($request->all());
        return new ProgramResource(Program::find($id));
    }

    public function delete(int $id) : ProgramResource
    {
        $program = Program::find($id);
        $program->delete();
        return new ProgramResource($program);
    }

    public function clear() : ProgramCollection
    {
        $program_all = Program::paginate();
        Program::truncate();
        return new ProgramCollection($program_all);
    }
}

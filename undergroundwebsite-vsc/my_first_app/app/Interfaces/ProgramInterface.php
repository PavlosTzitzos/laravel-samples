<?php

namespace App\Interfaces;

use App\Http\Resources\V1\ProgramResource;
use App\Http\Resources\V1\ProgramCollection;
use App\Http\Requests\V1\ProgramFormRequest;
use Illuminate\Contracts\Pagination\Paginator;

interface ProgramInterface
{
    public function getAll() : ProgramCollection;

    public function getById(int $id) : ProgramResource;

    public function addNew(ProgramFormRequest $request) : ProgramResource;

    public function edit(int $id, ProgramFormRequest $request) : ProgramResource;

    public function delete(int $id) : ProgramResource;

    public function clear() : ProgramCollection;
}

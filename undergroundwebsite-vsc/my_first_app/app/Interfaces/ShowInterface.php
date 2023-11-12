<?php

namespace App\Interfaces;

use App\Http\Resources\V1\ShowResource;
use App\Http\Resources\V1\ShowCollection;
use App\Http\Requests\V1\ShowFormRequest;
use Illuminate\Contracts\Pagination\Paginator;

interface ShowInterface
{
    public function getAll() : ShowCollection;

    public function getById(int $id) : ShowResource;

    public function addNew(ShowFormRequest $request) : ShowResource;

    public function edit(int $id, ShowFormRequest $request) : ShowResource;

    public function delete(int $id) : ShowResource;
}

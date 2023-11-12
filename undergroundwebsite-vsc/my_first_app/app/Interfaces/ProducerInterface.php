<?php

namespace App\Interfaces;

use App\Http\Resources\V1\ProducerResource;
use App\Http\Resources\V1\ProducerCollection;
use App\Http\Requests\V1\ProducerFormRequest;
use Illuminate\Contracts\Pagination\Paginator;

interface ProducerInterface
{
    public function getAll(): ProducerCollection;

    public function getById(int $id) : ProducerResource;

    public function addNew(ProducerFormRequest $request) : ProducerResource;

    public function edit(int $id, ProducerFormRequest $request) : ProducerResource;

    public function delete(int $id) : ProducerResource;
}

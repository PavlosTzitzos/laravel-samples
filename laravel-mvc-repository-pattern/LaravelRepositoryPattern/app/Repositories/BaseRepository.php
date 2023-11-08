<?php

namespace App\Repositories;

class BaseRepository implements BaseRepositoryInterface
{
    //
    public function __construct(protected Model $model)
    {
        //
    }

    public function find(int $id)
    {

        return $this->model->find($id)?->toArray();
    }

    public function create(array $data) : array
    {
        
        return $this->model->create($data)->toArray();
    }
}
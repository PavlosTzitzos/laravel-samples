<?php

namespace App\Repositories;

interface BaseRepositoryInterface
{
    //
    public function find(int $id);

    public function create(array $data);
}

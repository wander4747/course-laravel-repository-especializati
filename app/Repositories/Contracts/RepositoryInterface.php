<?php

namespace App\Repositories\Contracts;

interface RepositoryInterface
{
    public function getAll();
    public function findById($id);
    public function findWhere($column, $value);
    public function findWhereFirst($column, $value);
    public function paginate($totalPage = 10);
    public function store(array $data);
    public function update(int $id, array $data);
    public function delete(int $id);
}
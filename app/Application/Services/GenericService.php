<?php

namespace App\Application\Services;

use App\Application\Interfaces\IGenericService;
use App\Application\Interfaces\IGenericRepository;


abstract class GenericService implements IGenericService
{
    public $repository;

    public function __construct(IGenericRepository $repository)
    {
        $this->repository = $repository;
    }

    public function find(string $id)
    {
        return $this->repository->findById($id);
    }


    public function update(string $id, array $data)
    {
        // ... -> spread operator
        $dataToInsert = [...$data, 'id' => $id];
        $this->repository->update($dataToInsert);
    }

    public function delete(string $id)
    {
        $this->repository->delete($id);
    }

    public function findAll()
    {
        return $this->repository->findAll();
    }

}


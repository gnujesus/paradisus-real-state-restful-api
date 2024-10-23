<?php

namespace App\Services;

use App\Models\Amenity;
use App\Interfaces\IGenericService;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\IGenericRepository;
use Illuminate\Database\Eloquent\Model;

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


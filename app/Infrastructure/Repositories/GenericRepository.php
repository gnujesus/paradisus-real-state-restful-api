<?php

namespace App\Infrastructure\Repositories;

use Illuminate\Support\Facades\Auth;
use App\Application\Interfaces\IGenericRepository;

abstract class GenericRepository implements IGenericRepository
{
    public function __construct(public $model, public $resource)
    {
        //
    }

    public function findAll()
    {
        return $this->resource::class::collection($this->model::class::all());
    }



    public function findById(string $id)
    {
        return $this->model::class::findOrFail($id);
    }

    public function update(array $data)
    {
        // ... -> spread operator
        /* not needed on generic respository. 
         * still, i'm going to leave this here so people know it exists and 
         * i can use it for studying purposes
         * 
         *  $dataToInsert = [...$data, 'id' => $id];
         */
        $entity = $this->model::class::findOrFail($data['id']);
        $entity->update($data);
    }

    public function delete(string $id)
    {
        $entity = $this->model::class::findOrFail($id);
        $entity->delete();
    }
}

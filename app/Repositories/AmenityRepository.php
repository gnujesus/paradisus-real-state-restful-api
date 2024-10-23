<?php

namespace App\Repositories;

use \App\Models\Amenity;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\IAmenityRepository;
use \Illuminate\Http\Resources\Json\JsonResource;

class AmenityRepository extends GenericRepository implements IAmenityRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(Amenity $model, AmenityResource $resource)
    {
        parent::__construct($model, $resource);
    }
    public function store(array $data)
    {
        $data = [...$data];
        $data['agent_id'] = Auth::guard('api')->user()->id;
        return $this->model::class::create($data);
    }
}

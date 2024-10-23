<?php

namespace App\Repositories;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use App\Interfaces\IPropertyRepository;
use App\Http\Resources\Api\V1\PropertyResource;

class PropertyRepository extends GenericRepository implements IPropertyRepository
{
    /**
     * Create a new class instance.
     */
    public function __construct(Property $model, PropertyResource $resource)
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

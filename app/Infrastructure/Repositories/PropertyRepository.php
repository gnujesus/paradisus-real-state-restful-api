<?php

namespace App\Infrastructure\Repositories;

use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Api\V1\PropertyResource;
use App\Application\Interfaces\IPropertyRepository;

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

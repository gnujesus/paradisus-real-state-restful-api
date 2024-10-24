<?php

namespace App\Application\Services;

use Illuminate\Support\Facades\Auth;
use App\Application\Services\GenericService;
use App\Application\Interfaces\IPropertyRepository;

class PropertyService extends GenericService implements IPropertyService
{
    public function __construct(IPropertyRepository $repository)
    {
        parent::__construct($repository);
    }

    public function store($data)
    {
        $data = [...$data];
        $data['agent_id'] = Auth::guard('api')->user()->id;
        return $this->repository->store($data);
    }
}

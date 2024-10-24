<?php

namespace App\Application\Services;

use \App\Models\Amenity;
use Illuminate\Support\Facades\Auth;
use App\Application\Interfaces\IAmenityService;
use App\Application\Interfaces\IAmenityRepository;

class AmenityService extends GenericService implements IAmenityService
{
    public function __construct(IAmenityRepository $repository)
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

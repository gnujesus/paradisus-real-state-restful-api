<?php

namespace App\Services;

use \App\Models\Amenity;
use \App\Interfaces\IAmenityService;
use Illuminate\Support\Facades\Auth;
use App\Repositories\AmenityRepository;

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

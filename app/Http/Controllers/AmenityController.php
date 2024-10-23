<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Services\AmenityService;
use App\Interfaces\IAmenityService;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public IAmenityService $service;

    public function __construct(IAmenityService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
        return Amenity::all();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->find($id);
    }

}

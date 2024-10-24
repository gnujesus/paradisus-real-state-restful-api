<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use App\Http\Resources\Api\V1\AmenityResource;
use App\Application\Interfaces\IAmenityService;
use App\Http\Requests\Api\V1\Amenity\StoreAmenityRequest;
use App\Http\Requests\Api\V1\Amenity\UpdateAmenityRequest;

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
        return AmenityResource::collection(Amenity::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new AmenityResource($this->service->find($id));
    }

    public function store(StoreAmenityRequest $request)
    {
        return new AmenityResource($this->service->store($request->all()));
    }

    public function update(UpdateAmenityRequest $request, string $amenityId)
    {

        $data = $request->input('data.attributes');

        // dd($data);
        $this->service->update($amenityId, $data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
    }
}

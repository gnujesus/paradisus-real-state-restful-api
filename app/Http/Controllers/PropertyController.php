<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\V1\Property\UpdatePropertyRequest;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\PropertyService;
use App\Http\Resources\Api\V1\PropertyResource;
use App\Http\Requests\Api\V1\Property\StorePropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public PropertyService $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    public function index()
    {
        return PropertyResource::collection(Property::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        return new PropertyResource($this->propertyService->store($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PropertyResource($this->propertyService->findById($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, string $propertyId)
    {

        $data = $request->input('data.attributes');

        // dd($data);
        $this->propertyService->update($propertyId, $data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

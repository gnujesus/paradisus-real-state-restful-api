<?php

namespace App\Http\Controllers;

use App\Models\Property;
use Illuminate\Http\Request;
use App\Services\PropertyService;
use App\Interfaces\IGenericService;
use App\Interfaces\IPropertyService;
use App\Http\Resources\Api\V1\PropertyResource;
use App\Http\Requests\Api\V1\Property\StorePropertyRequest;
use App\Http\Requests\Api\V1\Property\UpdatePropertyRequest;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public IPropertyService $service;

    public function __construct(IPropertyService $service)
    {
        $this->service = $service;
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
        return new PropertyResource($this->service->store($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new PropertyResource($this->service->find($id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, string $propertyId)
    {

        $data = $request->input('data.attributes');

        // dd($data);
        $this->service->update($propertyId, $data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $this->service->delete($id);
    }
}

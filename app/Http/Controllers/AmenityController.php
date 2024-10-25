<?php

namespace App\Http\Controllers;

use App\Models\Amenity;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
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
        Gate::authorize('viewAny', Amenity::class);
        return AmenityResource::collection(Amenity::all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $amenity = $this->service->find($id);

        Gate::authorize('view', [Amenity::class, $amenity]);
        return new AmenityResource($this->service->find($id));
    }

    public function store(StoreAmenityRequest $request)
    {
        Gate::authorize('store', Amenity::class);
        return new AmenityResource($this->service->store($request->all()));
    }

    public function update(UpdateAmenityRequest $request, string $amenityId)
    {
        Gate::authorize('update', [Amenity::class, $this->service->find($amenityId)]);

        $data = $request->input('data.attributes');
        // dd($data);
        $this->service->update($amenityId, $data);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $amenityId)
    {
        Gate::authorize('destroy', [Amenity::class, $this->service->find($amenityId)]);

        $this->service->delete($amenityId);
    }
}

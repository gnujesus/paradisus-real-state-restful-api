<?php

namespace App\Http\Resources\Api\V1;

use App\Models\Amenity;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AmenityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function __construct(Amenity $resource)
    {
        $this->resource = $resource;
    }

    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'amenity',
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'agent_id' => $this->agent_id,
            ]
        ];
    }
}

<?php

namespace App\Http\Resources\Api\V1;

use \App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function __construct(Property $resource)
    {
        $this->resource = $resource;
    }


    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'type' => 'property',
            'attributes' => [
                'name' => $this->name,
                'description' => $this->description,
                'price' => $this->price,
            ]
        ];
    }
}

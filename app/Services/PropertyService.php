<?php

namespace App\Services;

use App\Models\Property;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class PropertyService
{
    public function store($data)
    {
        $data = [...$data];
        $data['agent_id'] = Auth::guard('api')->user()->id;
        return Property::create($data);
    }

    public function findById(string $id)
    {
        return Property::findOrFail($id);
    }

    public function update(string $id, array $data)
    {
        // ... -> spread operator
        $dataToInsert = [...$data, 'id' => $id];
        $property = Property::findOrFail($id);
        $property->update($dataToInsert);
    }

    public function delete(string $id)
    {
        $property = Property::findOrFail($id);
        $property->delete();
    }
}

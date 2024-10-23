<?php

namespace App\Models;

class Property extends BaseModel
{

    public static $rules = [
        'data.attributes.name' => 'required',
        'data.attributes.price' => 'required',
        'data.attributes.type' => ['required', 'in:house,apartment,penthouse'],
        'data.attributes.status' => ['required', 'in:on-sale,sold,building'],
    ];

    public static $patchRules = [
        'data.attributes.name' => ['sometimes', 'required'],
        'data.attributes.price' => ['sometimes', 'required'],
        'data.attributes.type' => ['sometimes', 'required', 'in:house,apartment,penthouse'],
        'data.attributes.status' => ['sometimes', 'required', 'in:on-sale,sold,building'],
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'status',
        'agent_id'
    ];

    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'amenity_property');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

}

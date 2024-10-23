<?php

namespace App\Models;

class Property extends BaseModel
{
    public function amenities()
    {
        return $this->belongsToMany(Amenity::class, 'amenity_property');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public static $rules = [
        'name' => 'required',
        'price' => 'required',
        'type' => ['required', 'in:house,apartment,penthouse'],
        'status' => ['required', 'in:on-sale,sold,building'],
    ];

    protected $fillable = [
        'name',
        'description',
        'price',
        'type',
        'status',
        'agent_id'
    ];

}

<?php

namespace App\Models;

class Amenity extends BaseModel
{
    public function properties()
    {
        return $this->belongsToMany(Property::class, 'amenity_property');
    }

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public static $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    public $fillable = [
        'name',
        'description',
        'agent_id',
    ];

}

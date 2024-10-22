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
        return $this->belongsTo(User::class);
    }

}

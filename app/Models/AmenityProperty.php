<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AmenityProperty extends Pivot
{
    /** @use HasFactory<\Database\Factories\AmenityPropertyFactory> */
    use HasFactory;

    protected $table = 'amenity_property';

}

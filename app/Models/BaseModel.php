<?php

namespace App\Models;

use Symfony\Component\Uid\Ulid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaseModel extends Model
{

    use HasFactory, HasUlids;

    protected $keyType = 'string';

    public $incrementing = false;

    public function newUniqueId()
    {
        return (string) Ulid::generate();
    }

}

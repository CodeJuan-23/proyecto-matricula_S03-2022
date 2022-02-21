<?php

namespace App\Models\v1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use BinaryCabin\LaravelUUID\Traits\HasUUID;

class Padre extends Model
{
    use HasFactory;
    use HasUUID;

    protected $table="Padre";
    protected $primarykey="id";
    protected $keyType="string";
    protected $uuidFieldName="id";

}

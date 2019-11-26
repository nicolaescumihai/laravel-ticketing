<?php

namespace App\Models\Plane;

use Illuminate\Database\Eloquent\Model;

class Plane extends Model
{
    protected $table = 'plane';
    
    public $timestamps = false;
    public $incrementing = false;

    protected $guarded = [];
}

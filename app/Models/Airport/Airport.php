<?php

namespace App\Models\Airport;

use Illuminate\Database\Eloquent\Model;

class Airport extends Model
{
    protected $table = 'airport';
    
    public $timestamps = false;
    public $incrementing = false;

    protected $guarded = [];
}

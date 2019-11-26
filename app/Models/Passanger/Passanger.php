<?php

namespace App\Models\Passanger;

use Illuminate\Database\Eloquent\Model;

class Passanger extends Model
{
    protected $table = "passanger";

    public $timestamps = false;
    public $incrementing = false;

    protected $guarded = [];
    
    protected $fillable = [
        'first_name',
        'last_name',
        'nationality',
        'id_card',      
    ];
}

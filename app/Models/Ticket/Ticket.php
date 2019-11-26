<?php

namespace App\Models\Ticket;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $table = 'ticket';
    
    public $timestamps = false;
    public $incrementing = false;

    protected $guarded = [];
}

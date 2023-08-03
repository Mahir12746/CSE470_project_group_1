<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'match_id',
        'seat_number',
        
    ];

    public function matches()
    {
        return $this->belongsTo(Matches::class);
    }
}
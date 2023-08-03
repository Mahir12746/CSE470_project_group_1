<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matches extends Model
{
    use HasFactory;

    public function team1()
    {
        return $this->belongsTo(Club::class, 'team1_id');
    }

    public function team2()
    {
        return $this->belongsTo(Club::class, 'team2_id');
    }

    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'match_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchRequest extends Model
{
    use HasFactory;
    
    public function club()
{
    return $this->belongsTo(Club::class, 'club_id');
}

public function team2()
{
    return $this->belongsTo(Club::class, 'team2_id');
}
public function approvedMatch()
    {
        return $this->hasOne(Matches::class, 'match_request_id');
    }
    
}

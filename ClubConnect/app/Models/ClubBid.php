<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClubBid extends Model
{
    use HasFactory;

    protected $fillable = ['club_id', 'player_id', 'bid_number'];
}

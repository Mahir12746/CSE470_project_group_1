<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
    use HasFactory;

    public function club()
    {
        return $this->hasOne(Club::class);
    }
    
    protected $table = 'clubs';

    public function players()
    {
        return $this->hasMany(Player::class, 'club', 'club_name');
    }
    
    
}

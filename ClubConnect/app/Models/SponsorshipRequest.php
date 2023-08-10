<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SponsorshipRequest extends Model
{   

    protected $fillable = [
        'match_id',
        'sponsor_id',
        'image_path',
        'value',
        'status',
    ];

    public function match()
    {
        return $this->belongsTo(Matches::class, 'match_id');
    }

    

    
    use HasFactory;
}

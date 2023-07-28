<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    public static function searchPlayers($searchText)
    {
        return static::where('name', 'LIKE', '%' . $searchText . '%')
        ->orWhere('rank', 'like', '%' . $searchText . '%')
        ->orWhere('goals', 'like', '%' . $searchText . '%')
        ->orWhere('assists', 'like', '%' . $searchText . '%')
        ->orWhere('minsplayed', 'like', '%' . $searchText . '%')
        ->orWhere('expeirence', 'like', '%' . $searchText . '%')
        ->get();
    }
}

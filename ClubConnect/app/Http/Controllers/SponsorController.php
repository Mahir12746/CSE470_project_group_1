<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Matches;

use App\Models\Club;

class SponsorController extends Controller
{   
    public function matches_page()
    {   

        $matches = Matches::all();
        return view('sponsor.matches_page', compact('matches'));
    }

        public function club_page()
    {   

        $clubs = Club::all();
        return view('sponsor.club_page', compact('clubs'));
    }

    
}

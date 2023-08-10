<?php

namespace App\Http\Controllers;

use App\Models\Player;

use App\Models\ClubBid;

use App\Models\Club;

use App\Models\Ranking;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Models\Matches;

use App\Models\MatchRequest;

use App\Models\User;

use App\Models\Ticket;

use App\Models\SponsorshipRequest;

use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Log;

class SponsorController extends Controller
{   
    public function matches_page()
        {   
            $matches = Matches::all();

            foreach ($matches as $match) {
                $match->team1_name = Club::findOrFail($match->team1_id)->club_name;
                $match->team2_name = Club::findOrFail($match->team2_id)->club_name;
            }
            
            return view('sponsor.matches_page', compact('matches'));
        }


    public function send_sponsorship_request(Request $request)
{
    $request->validate([
        'match_id' => 'required|exists:matches,id',
        'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        'value' => 'required|numeric',
    ]);
    $user = Auth::user();
    $image = $request->file('image');
    $imageName = time() . '.' . $image->getClientOriginalExtension();
    $image->move(public_path('sponsor_image'), $imageName);

    SponsorshipRequest::create([
        'match_id' => $request->match_id,
        'sponsor_id' => $user->id,
        'image_path' => $imageName,
        'value' => $request->value,
    ]);

    return redirect()->back()->with('message', 'Sponsorship request submitted');
}

    public function requests_page()
    {
        $matches = SponsorshipRequest::with(['match.team1', 'match.team2'])->get();

        return view('sponsor.requests_page', compact('matches'));
    }


}

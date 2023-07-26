<?php

namespace App\Http\Controllers;

use App\Models\Club;

use App\Models\Player;

use App\Models\ClubBid;

use App\Models\ClubPlayer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;



class ClubController extends Controller
{
    public function my_club_page()
{
    $user = Auth::user();
    $club = Club::where('user_id', $user->id)->first();

    return view('club.my_club_page', compact('club'));
}
    

    public function create_club_page()
    {
    	return view('club.create_club_page');
    }
    

    public function create_club(Request $request)
{
    $validatedData = $request->validate([
        'club_name' => 'required|string',
        'club_location' => 'required|string',
        'club_logo' => 'nullable|image|max:2048',
    ]);

    $user = Auth::user();

    $club = new Club();
    $club->club_name = $request->club_name;
    $club->club_location = $request->club_location;

    if ($request->hasFile('club_logo')) {
        $image = $request->file('club_logo');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('club_images'), $imageName);
        $club->club_logo = $imageName;
    }

    $club->user_id = $user->id; // Set the user_id for the club

    $club->save();

    return redirect(url('/my_club_page'))->with('message', 'Club Created Successfully');
}
    public function edit_club_page()
    {
    	return view('club.edit_club_page');
    }
    
    public function show_player_page()
{
    $user = Auth::user();
    $club = Club::where('user_id', $user->id)->first();

    if ($club) {
        // If the user is associated with a club, get the players of that club
        $players = $club->players;
    } else {
        // If the user is not associated with any club, show an empty array
        $players = [];
    }

    return view('club.show_player_page', compact('players'));
}

    public function squad_page()
{
    $user = Auth::user();
    $club = Club::where('user_id', $user->id)->first();

    if ($club) {
        // If the user is associated with a club, get the players of that club
        $players = $club->players;
    } else {
        // If the user is not associated with any club, show an empty array
        $players = [];
    }

    return view('club.squad_page',compact('players'));
}


public function submitBid(Request $request, $playerId)
{
    $clubId = auth()->user()->id;

    $bidNumber = $request->input('bid_number');

    ClubBid::create([
        'club_id' => $clubId,
        'player_id' => $playerId,
        'bid_number' => $bidNumber,
    ]);

    return redirect()->back()->with('message', 'Bid submitted successfully');
}


public function bidStatus()
{
    $user = Auth::user();
    $club = Club::where('user_id', $user->id)->first();
    $bids = ClubBid::where('club_id', $club->user_id )->get();

    return view('club.bid_status', compact('bids'));
}




}


<?php

namespace App\Http\Controllers;

use App\Models\Club;

use App\Models\Player;

use App\Models\ClubBid;

use App\Models\ClubPlayer;

use App\Models\MatchRequest;

use PDF;

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
        $user = Auth::user();
        $club = Club::where('user_id', $user->id)->first(); 

        return view('club.edit_club_page', compact('club'));
    }

    public function update_club(Request $request, Club $club)
{
    $validatedData = $request->validate([
        'club_name' => 'required|string',
        'club_location' => 'required|string',
        'club_logo' => 'nullable|image|max:2048',
    ]);

    $club->club_name = $request->club_name;
    $club->club_location = $request->club_location;

    if ($request->hasFile('club_logo')) {
        $image = $request->file('club_logo');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('club_images'), $imageName);
        $club->club_logo = $imageName;
    }

    $club->save();

    return redirect()->back()->with('message', 'Club Updated Successfully');
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

public function show_other_player_page()
{
    $user = Auth::user();
    $club = Club::where('user_id', $user->id)->first();
    $clubName = null; // Initialize clubName variable

    if ($club) {
        $clubName = $club->club_name; // Store the club_name value in the variable
        $players = Player::where('club', '!=', $clubName)->get();
    } else {
        $players = Player::all();
    }

    return view('club.show_other_player_page', compact('players'));
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

    return redirect()->back();
}


public function bidStatus()
    {
    $user = Auth::user();
    $club = Club::where('user_id', $user->id)->first();
    $bids = ClubBid::where('club_id', $club->user_id )->get();

    return view('club.bid_status', compact('bids'));
    }

public function request_match_page()
    {
        $clubs = Club::all();
        return view('club.request_match_page', compact('clubs'));
    }

public function send_match_request(Request $request)
    {
        $request->validate([
            'team2' => 'required|different:team1|exists:clubs,id',
            'match_datetime' => 'required|date',
            'stadium' => 'required|string',
        ]);
    
        $matchRequest = new MatchRequest;
        $matchRequest->club_id = auth()->user()->id; 
        $matchRequest->team2_id = $request->team2;
        $matchRequest->match_datetime = $request->match_datetime;
        $matchRequest->stadium = $request->stadium;
        $matchRequest->status = 'pending'; 
        $matchRequest->save();
    
        return redirect()->back()->with('message', 'Match request sent successfully');
    }


public function print_pdf($id)
{
    // Step 1: Access the clubs table to get the club_name based on the given $id
    $club = Club::where('user_id', $id)->first();

    // If the club with the given $id is not found, you can handle the error accordingly.
    if (!$club) {
        return redirect()->back()->with('error', 'Club not found.');
    }

    // Store the club_name in a variable
    $clubName = $club->club_name;

    // Step 2: Access the players table to get the players associated with the club
    $players = Player::where('club', $clubName)->get();

    // Step 3: Generate the PDF with the player details
    $pdf = PDF::loadView('club.pdf', compact('players'));
    return $pdf->download('report_details.pdf');
}


public function report_generate()
{
    return view('club.report_generate');
}


public function getCurrentUserId()
{
    $userId = auth()->user()->id;
    return $userId;
}


}
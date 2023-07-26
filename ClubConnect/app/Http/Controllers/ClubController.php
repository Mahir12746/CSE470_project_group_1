<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Club;

use App\Models\Player;

use App\Models\ClubPlayer;


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
    $players = Player::all();
    return view('club.show_player_page', compact('players'));
}

    public function squad_page()
{
    $players = Player::all(); 
    return view('club.squad_page',compact('players'));
}
 

}


<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;

use App\Models\Ranking;

class AdminController extends Controller
{
    public function add_player_page()
    {
    	return view('admin.Add_Player');
    }

    public function add_player_info(Request $request)
    {
    $player = new Player;
    $player->name = $request->name;
    $player->age = $request->age;
    $player->height = $request->height;
    $player->weight = $request->weight;
    $player->contact = $request->contact;
    $player->address = $request->address;
    $player->position = $request->position;
    $player->expeirence = $request->experience;
    $player->goals = $request->goals ?: 0;
    $player->assists = $request->assist ?: 0;
    $player->minsplayed = $request->minutes_played ?: 0;

    // Handle image upload
    if ($request->hasFile('pimage')) {
        $image = $request->file('pimage');
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $image->move('player_images', $imageName);
        $player->pimage = $imageName;
    }
    
    $player->save();
    
    return redirect()->back()->with('message', 'Player Added Successfully');
    }


    public function track_performance_page()
    {
        return view('admin.Track_Performance');
    }

    public function generate_rating_page()
    {
        return view('admin.Generate_rating');
    }

    public function find_player_ranking(Request $request)
    {
        // Retrieve the player's name from the request
        $playerName = $request->name;

        // Check if the player exists in the players table
        $player = Player::where('name', $playerName)->first();

        if ($player) {
            // Player exists in the players table
            // Continue saving the ranking information


            // calculate the ranking_value
            $experience = $request->experience;
            $goals = $request->goals;
            $assists = $request->assist;
            $minutesPlayed = $request->minutes_played;

            $rankingValue = $experience + ($goals * 2) + ($assists * 1.5) + ($minutesPlayed / 90);

            $newRankingValue = $rankingValue;



            $ranking = new Ranking;
            $ranking->name = $request->name;
            $ranking->age = $request->age;
            $ranking->height = $request->height;
            $ranking->weight = $request->weight;
            $ranking->playing_position = $request->playing_position;
            $ranking->experience = $request->experience;
            $ranking->goals = $request->goals;
            $ranking->assist = $request->assist;
            $ranking->minutes_played = $request->minutes_played;
            $ranking->ranking_value = $newRankingValue;
            //$ranking->rank = $rank;

            // Handle image upload
            if ($request->hasFile('pimage')) {
                $image = $request->file('pimage');
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $image->move('player_images', $imageName);
                $ranking->pimage = $imageName;
            }

            $ranking->save();


            $players = Ranking::all();
            $existingPlayers = $players->sortByDesc('ranking_value');
            $rank = 1;
            foreach ($existingPlayers as $player) {
                // Update the desired column value for each player
                $player->rank = $rank; 
                $player->save(); // Save the changes to the database
                $rank++;
            }


            return redirect()->back()->with('message', 'Player Data Added and Rated Successfully');
        } else {
            // Player does not exist in the players table
            return redirect()->back()->with('error', 'The player does not exist in our database.');
        }
    }

}

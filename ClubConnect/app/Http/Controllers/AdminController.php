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
        $ranking = new Ranking;
        $ranking->age = $request->age;
        $ranking->height = $request->height;
        $ranking->weight = $request->weight;
        $ranking->playing_position = $request->playing_position;
        $ranking->experience = $request->experience;
        $ranking->goals = $request->goals;
        $ranking->assist = $request->assist;
        $ranking->minutes_played = $request->minutes_played;


            // Handle image upload
        if ($request->hasFile('pimage')) {
            $image = $request->file('pimage');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move('player_images', $imageName);
            $ranking->pimage = $imageName;
        }
        
        $ranking->save();
        
        return redirect()->back()->with('message', 'Player Data Added Successfully');
        
    }
}

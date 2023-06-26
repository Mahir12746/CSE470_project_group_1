<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Player;

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
        $players = Player::all();
        return view('admin.Track_Performance', compact('players'));
    }

    public function update_performance(Request $request, $id)
    {
        $player = Player::find($id);
        if ($player) {
            if ($request->has('goals')) {
                $player->goals = $request->goals;
            }
            if ($request->has('assists')) {
                $player->assists = $request->assists;
            }
            if ($request->has('minsplayed')) {
                $player->minsplayed = $request->minsplayed;
            }
            $player->save();
        }
        return redirect()->back()->with('message', 'Performance Updated Successfully');
    }
    public function generate_rating_page()
    {
        return view('admin.Generate_Rating');
    }

    
}

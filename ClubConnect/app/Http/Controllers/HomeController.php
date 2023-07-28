<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Player;

class HomeController extends Controller
{

    public function index()
	{
        return view('home.fanpage');
    }

    public function redirect()
    {
    	$usertype=Auth::user()->usertype;

    	if ($usertype=='1')
    	{
    		return view('admin.home');
    	}
        elseif ($usertype=='2')
    	{
    		return view('club.home');
    	}
        else 
        {
            return view('home.fanpage');
        }
    }


    public function searchplayer(Request $request)
    {
        $searchText = $request->search;
        $players = Player::searchPlayers($searchText);
        return view('players_page', compact('players'));
    }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Player;
use App\Models\Comment;
use App\Models\Reply;


class HomeController extends Controller
{

    public function index()
	{
        $comment=comment::orderby('id', 'desc')->get();
        $reply=reply::all();
        return view('home.fanpage', compact('comment', 'reply'));
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
            $comment=comment::orderby('id', 'desc')->get();
            $reply=reply::all();
            return view('home.fanpage',compact('comment', 'reply'));
        }
    }


    public function searchplayer(Request $request)
    {
        $searchText = $request->search;
        $players = Player::searchPlayers($searchText);
        return view('players_page', compact('players'));
    }

    public function add_comment(Request $request)
    {
        if(Auth::id())
        {
            $comment=new comment;
            $comment->name=Auth::user()->name;
            $comment->user_id=Auth::user()->id;
            $comment->comment=$request->comment;
            $comment->save();
            return redirect()->back();

        }
        else
        {
            return redirect('login');
        }
    }

    public function add_reply(Request $request)
    {
        if(Auth::id())
        {
            $reply=new reply;
            $reply->name=Auth::user()->name;
            $reply->user_id=Auth::user()->id;
            $reply->comment_id=$request->commentId;
            $reply->reply=$request->reply;
            $reply->save();
            return redirect()->back();
        }

        else
        {
            return redirect('login');
        }
    }
}
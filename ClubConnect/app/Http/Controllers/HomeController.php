<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\Player;

use App\Models\Comment;

use App\Models\Reply;

use App\Models\Matches;

use App\Models\Club;

use App\Models\Ticket;




class HomeController extends Controller
{

    public function index()
{
    $comment=comment::orderby('id', 'desc')->get();
            $reply=reply::all();
            $clubs = Club::all();
            $players = Player::orderBy('rank', 'asc')->get();
            $approvedMatches = Matches::with(['team1', 'team2', 'tickets'])
                             ->where('status', 'Approved')
                             ->get();
            return view('home.homepage',compact('comment', 'reply', 'approvedMatches', 'clubs','players'));
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
        elseif ($usertype=='3')
    	{
    		return view('sponsor.home');
    	}
        else 
        {
            $comment=comment::orderby('id', 'desc')->get();
            $reply=reply::all();
            $clubs = Club::all();
            $players = Player::orderBy('rank', 'asc')->get();
            $approvedMatches = Matches::with(['team1', 'team2', 'tickets'])
                             ->where('status', 'Approved')
                             ->get();
            return view('home.fanpage',compact('comment', 'reply', 'approvedMatches', 'clubs','players'));
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

    public function purchaseTicket(Ticket $ticket)
    {
        // if the ticket is available
        if ($ticket->is_available && !$ticket->is_purchased) {
            $ticket->is_purchased = true;
            $ticket->is_available = false;
            $ticket->save();

            return redirect()->back()->with('message', 'Ticket purchased successfully!');
        }

        //show error message
        return redirect()->back()->with('error', 'Sorry, the ticket is not available for purchase.');
    }
    public function purchaseTicketsMatch(Matches $match)
    {
        // Fetch available tickets 
        $availableTickets = $match->tickets()->where('is_available', true)->get();

        return view('purchase_tickets', compact('match', 'availableTickets'));
    }
}
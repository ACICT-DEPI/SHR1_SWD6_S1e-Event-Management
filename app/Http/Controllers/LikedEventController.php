<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikedEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        //
        $events = Event::with('likes')->whereHas('likes',function ($e){
            $e->where('user_id',Auth::id());
        })->get();
        return view('event.likedEvents',compact('events'));
    }
}

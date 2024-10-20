<?php

namespace App\Http\Controllers;

use App\Models\Attending;
use App\Models\Event;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        //
        $events = Event::all()->count();
        $likedEvent = Like::all()->count();
        $attendingEvent = Attending::all()->count();

        return view('dashboard',compact('events','likedEvent','attendingEvent'));
    }
}

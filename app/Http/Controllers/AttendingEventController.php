<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttendingEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        //
        $events =Event::with('attendings')->whereHas('attendings',function($e){
            $e->where('user_id',Auth::id());
        })->get();

        return view('event.attendingEvents',compact('events'));
    }
}

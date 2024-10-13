<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedEventController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        //
        $events = Event::with('savedEvents')->whereHas('savedEvents',function($e){
            $e->where('user_id',Auth::id());
        })->get();

        return view('event.savedEvents',compact('events'));
    }
}

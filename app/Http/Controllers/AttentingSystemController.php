<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AttentingSystemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function attendingSystem($id)
    {
        //
        //dd($id);
        $event = Event::findOrFail($id);
        $attending = $event->attendings->where('user_id',Auth::id())->first();

        if (!is_null($attending)) {
            # code...
            //dd($attending);
            $attending->delete();
            return back();
        }else{

            $attending = $event->attendings()->create([
                'user_id' => Auth::id(),
                'num_tickets' => 1
            ]);
            return back();
        }

    }
}

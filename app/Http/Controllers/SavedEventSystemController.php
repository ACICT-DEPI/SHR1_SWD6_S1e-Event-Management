<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SavedEventSystemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function saveEvents($id)
    {
        //

        $event = Event::findOrFail($id);
        $savedEvent = $event->savedEvents->where('user_id',Auth::id())->first();
        if(!is_null($savedEvent)){
            $savedEvent->delete();
            return back();
        }else{
            // dd('done');
            $savedEvent = $event->savedEvents()->create([
                'user_id'=> Auth::id(),
            ]);
            return back();
        }
    }
}

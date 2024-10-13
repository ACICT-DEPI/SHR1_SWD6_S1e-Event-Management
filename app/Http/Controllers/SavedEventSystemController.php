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
    public function __invoke($id)
    {
        //
        $event = Event::findOrFail($id);
        $savedEvent = $event->where('user_id',Auth::id())->first();
        if(!is_null($savedEvent)){
            $event->delete();
            return null;
        }else{
            $savedEvent = $event->savedEvents()->create([
                'user_id'=> Auth::id(),
            ]);
            return $savedEvent;
        }
    }
}

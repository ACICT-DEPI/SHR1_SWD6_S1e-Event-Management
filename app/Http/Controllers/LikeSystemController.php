<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikeSystemController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function likeSystem($id)
    {
        //
        //dd($id);
        $event = Event::findOrFail($id);
        $like= $event->likes->where('user_id',Auth::id())->first();
        if(!is_null($like)){
            $like->delete();
            return back();
        }else{
            $like = $event->likes()->create([
                'user_id'=>Auth::id()
            ]);
            return back();
        }
    }
}

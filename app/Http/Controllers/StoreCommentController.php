<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreCommentController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request,$id)
    {
        //

        $data = $request->all();
        $event = Event::findOrFail($id);
        $event->comments()->create([
            'user_id'=>Auth::id(),
            'content'=>$data['content']
        ]);
        return back();
    }
}

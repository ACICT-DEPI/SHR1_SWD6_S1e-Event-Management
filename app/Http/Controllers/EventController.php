<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\City;
use App\Models\Country;
use App\Models\Event;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{



    function saveImage($request){
        if ($request->hasfile("image")) {
            # code...
            $image=$request->file("image");

            $publicPath=public_path("uploads");
            $image_name= time().$image->getClientOriginalName();
            $image->move($publicPath,$image_name);
            $request->image=$image_name;
            return $request->image;
        }
        return null;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $events = Event::with('country')->get();
        return view('event.index',compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $countries =Country::all();
        $cities = City::all();
        $tags = Tag::all();
        return view('event.create',compact('countries','cities','tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateEventRequest $request)
    {
        //
        //dd($request);
        if ($request->hasFile('image')) {
            # code...

            $data =$request->validated();

            $data['image'] = $this->saveImage($request);
            $data['user_id'] = Auth::id();
            $data['slug']=Str::slug($request->title);

            $event = Event::create($data);
            $event->tags()->attach($request->tags);
            return to_route("events.index");
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
        $countries =Country::all();
        $cities = City::all();
        $tags = Tag::all();
        return view('event.edit',compact('countries','cities','tags','event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventRequest $request, Event $event)
    {
        //
        //dd($request);
        $data =$request->validated();
        if ($request->hasFile('image')) {
            # code...

            Storage::delete($event->image);
            $data['image'] = $this->saveImage($request);

        }

        $data['slug']=Str::slug($request->title);

            $event->update($data);
            $event->tags()->sync($request->tags);
            return to_route("events.index");

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event)
    {
        //
        Storage::delete($event->image);
        $event->delete();

        return to_route('events.index')->with('msg','Deleted successfuly...');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */

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
    public function index()
    {
        //
        $user = FacadesAuth::id();
        $galleries = Gallery::all()->where('user_id',$user);

        return view('Gallery.index',compact('galleries'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('Gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd($request);
        if ($request->hasFile('image')) {
            # code...
            $data = $request->validate([
                'image'=>'required|image',
                'caption'=>'required|min:5|max:100'
            ]);

            $data['image'] = $this->saveImage($request); //Storage::disk('public')->putFile('gallery',$request->file('image'));
            $data['user_id']=FacadesAuth::id();
            Gallery::create($data);

            return to_route('gallery.index');

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
    public function edit(Gallery $gallery)
    {
        //
        return view('Gallery.edit',compact('gallery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gallery $gallery)
    {

        //
        $data = $request->validate([
            'caption'=>'required|min:5|max:100',
            'image'=>'image'
        ]);

        if ($request->hasFile('image')) {
            # code...
            $gallery->unlink($gallery->image);
            $data['image']=$this->saveImage($request);
        }

        $gallery->update($data);
        return to_route('gallery.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gallery $gallery)
    {
        //
        $gallery->delete();
        return to_route('gallery.index');
    }
}

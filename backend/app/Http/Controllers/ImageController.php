<?php

namespace App\Http\Controllers;

use App\image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $image = Image::orderBy('posted', 'description')->paginate(3);
        return view('image.index', ['image' => $image]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('image.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'posted'=>'required',
            'image'=>'required|image|mimes:jpeg,png,gif,svg|max:2048',
            'lieu'=>'required|min:1',
            'description'=>'required|min:1',
        ]);

        // $input = $request->all();

        $imageName = time() . '.' . $request->image->extension();
        $request->image->storeAs('public/images', $imageName);
        $postData = ['description' => $request->description, 'lieu'=> $request->lieu, 'posted'=> time(), 'image'=> $imageName];

        Images::create($postData);
        return redirect('/image')->with(['message' => 'Images added successfully!', 'status' => 'success']);
      
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function show(image $image)
    {
        //
        return view('image.show', ['image' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function edit(image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\image  $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(image $image)
    {
        //
    }
}

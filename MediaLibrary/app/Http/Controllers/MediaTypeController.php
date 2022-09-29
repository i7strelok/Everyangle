<?php

namespace App\Http\Controllers;

use App\Models\MediaType;
use Illuminate\Http\Request;

class MediaTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediatypes = MediaType::paginate(10);
        return view('mediatypes.index', compact('mediatypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mediatypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fields = request()->validate([
            'name' => 'required|unique:media_types|max:60|min:2',
        ]);
        MediaType::create($fields);
        return redirect()->route('mediatypes.index')->with('status', 'The media type has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaType  $mediatype
     * @return \Illuminate\Http\Response
     */
    public function show(MediaType $mediatype)
    {
        return view('mediatypes.show', compact('mediatype'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaType  $mediatype
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaType $mediatype)
    {
        return view('mediatypes.edit', compact('mediatype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaType  $mediatype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaType $mediatype)
    {
        $fields = request()->validate([
            'name' => 'required|max:60|min:2|unique:media_types,name,'.$mediatype->id,
        ]);
        $mediatype->update($fields);
        return redirect()->route('mediatypes.index')->with('status', 'The media type has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaType  $mediatype
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaType $mediatype)
    {
        $mediatype->delete();
        return redirect()->route('mediatypes.index')->with('status', 'The media type was successfully deleted'); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;
use App\Models\MediaType;
use Illuminate\Http\Request;

class MediaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mediaitems = MediaItem::paginate(10);
        return view('mediaitems.index', compact('mediaitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediatypes = MediaType::all();
        return view('mediaitems.create', compact('mediatypes'));
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
            'name' => 'required|unique:media_items|max:60|min:2',
            'description' => 'max:200',
            'media_type_id' => 'required|numeric|exists:media_types,id', 
            'filename' => 'required', 
        ]);
        MediaItem::create($fields);
        return redirect()->route('mediaitems.index')->with('status', 'The media item has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MediaItem  $mediaitem
     * @return \Illuminate\Http\Response
     */
    public function show(MediaItem $mediaitem)
    {
        return view('mediaitems.show', compact('mediaitem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaItem  $mediaitem
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaItem $mediaitem)
    {
        return view('mediaitems.edit', compact('mediaitem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MediaItem  $mediaitem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MediaItem $mediaitem)
    {
        $fields = request()->validate([
            'name' => 'required|max:60|min:2|unique:media_items,name,'.$mediaitem->id,
        ]);
        $mediaitem->update($fields);
        return redirect()->route('mediaitems.index')->with('status', 'The media item has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MediaItem  $mediaitem
     * @return \Illuminate\Http\Response
     */
    public function destroy(MediaItem $mediaitem)
    {
        $mediaitem->delete();
        return redirect()->route('mediaitems.index')->with('status', 'The media item was successfully deleted'); 
    }
}

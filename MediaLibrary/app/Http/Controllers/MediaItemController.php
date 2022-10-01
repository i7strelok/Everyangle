<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;
//use App\Models\MediaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMediaItemRequest;
use App\Http\Requests\UpdateMediaItemRequest;
class MediaItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$mediaitems = MediaItem::with('mediatype')->paginate(10);
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
        $mediatypes = array_keys(\App\MediaTypes\AbstractMediaType::getMediaTypes());
        //$mediatypes = \App\MediaTypes\MediaTypeEnum::getAllValues();
        return view('mediaitems.create', compact('mediatypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMediaItemRequest $request)
    {
        //Retrieve the validated input data...
        $validated=$request->safe();
        $path = Storage::putFile('public/files', $validated['file']);
        $mediaItem = new MediaItem;
        $mediaItem->name = $validated['name'];
        $mediaItem->description = $validated['description'];
        $mediaItem->media_type = $validated['media_type']; //\App\MediaTypes\MediaTypeEnum::MUSIC;
        $mediaItem->filename = $path;
        $mediaItem->save();
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
    public function update(UpdateMediaItemRequest $request, MediaItem $mediaitem)
    {
        //Retrieve the validated input data...
        $validated=$request->safe();
        $mediaitem->name = $validated['name'];
        $mediaitem->description = $validated['description'];
        $mediaitem->update();
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
        if (Storage::exists($mediaitem->filename)) {
            Storage::delete('/'.$mediaitem->filename);
        }
        $mediaitem->delete();
        return redirect()->route('mediaitems.index')->with('status', 'The media item was successfully deleted'); 
    }
}

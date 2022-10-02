<?php

namespace App\Http\Controllers;

use App\Models\MediaItem;
//use App\Models\MediaType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreMediaItemRequest;
use App\Http\Requests\UpdateMediaItemRequest;
use App\Models\Category;

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
        $mediaitems = MediaItem::paginate(7);
        return view('mediaitems.index', compact('mediaitems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediatypes = array_keys(\App\MediaTypes\MediaType::getMediaTypes());
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
        $mediaItem->categories()->attach($validated['categories']); //Attaching columns selected
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
        $categories = $mediaitem->categories()->getQuery()->pluck('name')->toArray();
        return view('mediaitems.show', compact('mediaitem', 'categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MediaItem  $mediaitem
     * @return \Illuminate\Http\Response
     */
    public function edit(MediaItem $mediaitem)
    {
        //Getting all the categories of this specific media_type
        $categories = Category::where('media_type', '=', $mediaitem->media_type)->get();
        $categoriesSelected = $mediaitem->categories()->getQuery()->pluck('category_id')->toArray();
        return view('mediaitems.edit', compact('mediaitem', 'categories','categoriesSelected'));
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
        $mediaitem->categories()->detach(); //Detaching current columns
        $mediaitem->categories()->attach($validated['categories']); //Attaching columns selected
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

<?php

namespace App\Http\Controllers;

class MediaTypeController extends Controller
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
        //$mediatypes = MediaType::paginate(10);
        $mediatypes = [];
        $games = new \App\MediaTypes\GamesMediaType;
        $movies = new \App\MediaTypes\MoviesMediaType;
        $music = new \App\MediaTypes\MusicMediaType;
        array_push($mediatypes, [
            'name' => $games->getMediaTypeName(), 
            'mimetypes' => implode(' ', $games->getMimeTypes()),
        ]);
        array_push($mediatypes, [
            'name' => $movies->getMediaTypeName(), 
            'mimetypes' => implode(' ', $movies->getMimeTypes()),
        ]);
        array_push($mediatypes, [
            'name' => $music->getMediaTypeName(), 
            'mimetypes' => implode(' ', $music->getMimeTypes()),
        ]);
        return view('mediatypes.index', compact('mediatypes'));
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

}

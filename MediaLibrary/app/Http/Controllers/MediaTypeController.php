<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
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

    public function getCategories(Request $request){
        $data = [];
        try {
            $mediaType = $request->input('media_type');
            $categories = Category::where('media_type', '=', $mediaType)->get();
            foreach($categories as $category){
                $data[]= ['id' => $category->id, 'name' => $category->name];
            }
            $response = ['data' => $data];
            return response()->json($response);
        }catch (\Exception $e) {
            return response()->json([ 'message' => 'There was an error retrieving the records'.$e->getMessage()], 404);
        }        
    }

}

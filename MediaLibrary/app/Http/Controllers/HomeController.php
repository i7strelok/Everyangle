<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\MediaItem;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Only for authenticated users
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. 
     * Latest 3 categories and items added.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $images = [];
        $mediaTypes = \App\MediaTypes\MediaType::getMediaTypes();
        $categories = Category::latest()->take(3)->get();
        foreach($categories as $category){
            if(isset($mediaTypes[$category->media_type])){
                $images[$category->media_type] = $mediaTypes[$category->media_type]->getImage();
            }
        }
        $mediaItems = MediaItem::latest()->take(9)->get();
        return view('home', compact('categories', 'mediaItems', 'images'));
    }

    /**
     * Receive a category and get all Media Items in that category
     *
     * @param Category   $category  category
     * 
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function showMediaItemsByCategory (Category $category)
    {   
        if($category == NULL)
            abort(404, "The Category was not found");
        return view('mediaitems', compact('category'));
    }

    /**
     * Receive a Media Item to play
     *
     * @param MediaItem   $mediaitem  Receive the MediaItem to be played
     * 
     * @author Carlos Fernández <fernandez.carlos@outlook.es>
     * @return \Illuminate\Contracts\Support\Renderable
     */ 
    public function playMediaItem(MediaItem $mediaitem){
        if($mediaitem == NULL)
            abort(404, "The Media Item was not found");
        else{
            $view = $mediaitem->play();
            return view($view);  
        }
        
    }
}

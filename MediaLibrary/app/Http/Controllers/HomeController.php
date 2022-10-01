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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard. 
     * Latest 3 categories and items added.
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::latest()->take(3)->get();
        $mediaItems = MediaItem::latest()->take(9)->get();
        return view('home', compact('categories', 'mediaItems'));
    }

    public function showMediaItemsByCategory (Request $request)
    {
        /*$fields = request()->validate([
            'id' => 'required|exists:categories,id', 
        ]);*/
        $category = Category::with('mediaItems')->where('id', '=', $request->id)->get();
        $mediaItems = $category->mediaItems();           
        return view('mediaitems', compact('mediaItems'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MediaType;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
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
        //$categories = Category::with('mediatype')->paginate(10);
        $categories = Category::paginate(7);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediatypes = array_keys(\App\MediaTypes\MediaType::getMediaTypes());
        return view('categories.create', compact('mediatypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $mediaTypes = array_keys(\App\MediaTypes\MediaType::getMediaTypes());
        $fields = request()->validate([
            'name' => 'required|unique:categories|max:60|min:2',
            'media_type' => 'required|string|in:'.implode(',', $mediaTypes), 
        ]);
        Category::create($fields);
        return redirect()->route('categories.index')->with('status', 'The category has been successfully created');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $mediatypes = array_keys(\App\MediaTypes\MediaType::getMediaTypes());
        return view('categories.edit', compact('category', 'mediatypes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $mediaTypes = array_keys(\App\MediaTypes\MediaType::getMediaTypes());
        $fields = request()->validate([
            'name' => 'required|max:60|min:2|unique:categories,name,'.$category->id, 
        ]);
        $category->update($fields);
        return redirect()->route('categories.index')->with('status', 'The category has been successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->mediaitems()->detach(); //Detaching mediaitems
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'The category was successfully deleted'); 
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\MediaType;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('mediatype')->paginate(10);
        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mediatypes = MediaType::all();
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
        $fields = request()->validate([
            'name' => 'required|unique:categories|max:60|min:2',
            'media_type_id' => 'required|numeric|exists:media_types,id', 
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
        $mediatypes = MediaType::all();
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
        $fields = request()->validate([
            'name' => 'required|max:60|min:2|unique:categories,name,'.$category->id,
            'media_type_id' => 'required|numeric|exists:media_types,id', 
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
        $category->delete();
        return redirect()->route('categories.index')->with('status', 'The category was successfully deleted'); 
    }
}

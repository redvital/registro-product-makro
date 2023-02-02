<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.create')->only('create','store');
        $this->middleware('can:categories.edit')->only('edit','update');
        $this->middleware('can:categories.destroy')->only('destroy');

    }

    public function index()
    {
        $categories = Category::all();

        return view ('categories.index', compact('categories'));
    }

    public function create()
    {
        return view ('categories.create');
        
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories',
            'description' => 'required'
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'La categoria se creo con exito...');
    }

    public function edit(Category $category)
    {
        return view ('categories.edit', compact('category'));
        
    }

    public function update(Request $request,Category  $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id",
            'description' => 'required'

        ]);

        $category->update($request->all());
        return redirect()->route('categories.index', $category)->with('success', 'La categoria se actualizó con exito...');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.index')->with('success', 'La categoria se eliminó con exito...');
    }
}

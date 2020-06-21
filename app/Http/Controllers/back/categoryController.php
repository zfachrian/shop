<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Category;

class categoryController extends Controller
{

    public function index()
    {
        $data   =   Category::get();
        return view('back.category.index', compact('data'));
    }

    public function create()
    {
        return view('back.category.create');
    }
    
    public function store(Request $request)
    {
        // Form Validate
        $request->validate([
            'nama_kategori' => 'bail|required'
        ]);

        // Eloquent ORM
        $category = new Category;
        $category->category_name = $request->nama_kategori;
        $category->category_detail = $request->detail_kategori;
        $category->save();

        return redirect()->route('back.category.index')->with('success', 'Category was created!');
    }

    public function edit(Category $category)
    {
        return view('back.category.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        // Form Validate
        $request->validate([
            'nama_kategori' => 'bail|required',
        ]);

        // Eloquent ORM
        $category = Category::find($category->id);
        $category->category_name = $request->nama_kategori;
        $category->category_detail = $request->detail_kategori;
        $category->save();
        
        return redirect()->route('back.category.index')->with('success', 'category was update!');
    }

    public function destroy(Category $category)
    {
        Category::destroy($category->id);
        return redirect()->route('back.category.index')->with('success', 'category was delete!');
    }

}

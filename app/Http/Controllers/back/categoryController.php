<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
            'nama_kategori' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
        ]);

        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('category', 'public');
        } else {
            $gambar = null;
        }

        // Eloquent ORM
        $category = new Category;
        $category->category_name = $request->nama_kategori;
        $category->category_img = $gambar;
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
            'nama_kategori' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
        ]);

        // Eloquent ORM
        $category = Category::findOrFail($category->id);
            if($request->file('gambar')){
                $gambar = $request->file('gambar')->store('category', 'public');
                if($category->category_img){
                    Storage::delete('public/'.$category->category_img);
                    $category->category_img = $gambar;
                }else{
                    $category->category_img = $gambar;
                }
            }
        $category->category_name = $request->nama_kategori;
        $category->category_detail = $request->detail_kategori;
        $category->save();
        
        return redirect()->route('back.category.index')->with('success', 'category was update!');
    }

    public function destroy(Category $category)
    {
        if($category->category_img){
            Storage::delete('public/'.$category->category_img);
        }
        Category::destroy($category->id);
        return redirect()->route('back.category.index')->with('success', 'category was delete!');
    }

}

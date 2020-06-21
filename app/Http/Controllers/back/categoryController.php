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
}

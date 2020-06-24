<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Product;
use App\Http\Models\Category;

class productController extends Controller
{

    public function index()
    {
        $data = Product::with('category')->get();
        // echo json_encode($data);die();
        return view('back.product.index', compact('data'));
    }

    public function create()
    {
        $category = Category::get();
        return view('back.product.create', compact('category'));
    }

    public function store(Request $request)
    {
        if($request->hasFile('gambar')){
            $gambar = $request->file('gambar')->store('gambar', 'public');
        } else {
            $gambar = null;
        }
        // dd($request);
        // Form Validate
        $request->validate([
            'kategori' => ['bail|required'],
            'kode' => ['bail|required'],
            'kode_produk' => ['bail|required'],
            'nama_produk' => ['bail|required'],
            'harga' => ['bail|required'],
            'gambar' => ['mimes:jpg,png,jpeg,JPG,PNG,JPEG'],
        ]);

        // Eloquent ORM
        $Product = new Product;
        $Product->product_code = $request->kode.$request->kode_produk;
        $Product->product_name = $request->nama_produk;
        $Product->product_price = $request->harga;
        $Product->product_description = $request->deskripsi;
        $Product->categories_id = $request->kategori;
        $Product->save();
        return redirect()->route('back.product.index')->with('success', 'product was created!');
    }

    public function edit(Product $product)
    {
        $category = Category::get();
        return view('back.product.edit', compact('product', 'category'));
    }

    public function update(Request $request, Product $product)
    {
        
        // Form Validate
        $request->validate([
            'kategori' => 'bail|required',
            'kode_produk' => 'bail|required',
            'nama_produk' => 'bail|required',
            'harga' => 'bail|required',
        ]);
        
        // Eloquent ORM
        $Product = Product::find($product->id);
        $Product->product_code = $request->kode_produk;
        $Product->product_name = $request->nama_produk;
        $Product->product_price = $request->harga;
        $Product->product_description = $request->deskripsi;
        $Product->categories_id = $request->kategori;
        $Product->save();
        
        return redirect()->route('back.product.index')->with('success', 'product was update!');
    }

    public function destroy(Product $product)
    {
        Product::destroy($product->id);
        return redirect()->route('back.product.index')->with('success', 'product was delete!');
    }

}

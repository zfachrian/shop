<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        // dd($request);
        // Form Validate
        $request->validate([
            'kategori' => 'required',
            'kode' => 'required',
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
        ]);

        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('product', 'public');
        } else {
            $gambar = null;
        }

        // Eloquent ORM
        $Product = new Product;
        $Product->product_img = $gambar;
        $Product->product_code = $request->kode_produk;
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
            'kategori' => 'required',
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'harga' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
        ]);
        
        // Eloquent ORM
        $Product = Product::findOrFail($product->id);
            if($request->file('gambar')){
                $gambar = $request->file('gambar')->store('product', 'public');
                if($Product->product_img){
                    Storage::delete('public/'.$Product->product_img);
                    $Product->product_img = $gambar;
                }else{
                    $Product->product_img = $gambar;
                }
            }
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
        if($product->product_img){
            Storage::delete('public/'.$product->product_img);
        }
        Product::destroy($product->id);
        return redirect()->route('back.product.index')->with('success', 'product was delete!');
    }

}

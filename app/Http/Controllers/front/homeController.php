<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Banner;
use App\Http\Models\Product;
use App\Http\Models\Category;

class homeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Selamat Datang";
        $banner = Banner::get();
        $kategori = category::get();
        $product = product::get();
        $productKat1 = product::where('categories_id', 1)->get();
        $productKat2 = product::where('categories_id', 2)->get();
        $productKat3 = product::where('categories_id', 3)->get();
        // dd($product);

        return view('front.index', compact('title','banner', 'product', 'productKat1', 'productKat2', 'productKat3', 'kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

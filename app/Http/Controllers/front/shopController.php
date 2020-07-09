<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use App\Http\Models\Product;
use App\Http\Models\Category;

class shopController extends Controller
{
    public function index()
    {
        return view('front.shop');
    }

    public function detailProduct($id)
    {
        // echo "cok";die();
        $title = "Produk Detail";
        $product = product::where('id', $id)->first();
        $kategori = $product->categories_id;
        $productKat = product::where('categories_id', '=', $kategori, 'AND', 'id', '!=', $id)->get();
        // dd($productKat);
        return view('front.detailsProduct', compact('title', 'product', 'productKat'));
    }

    public function buy($id, Request $request)
    {
        
        $title = "Pesan Whatsapp";

        $product = product::where('id', $id)->first();
        $productName = $product->product_name;
        $jumlah = $request->jumlah;
        // dd($product->product_name);

        //zuhad
        // return Redirect()->away('https://api.whatsapp.com/send?phone=6281235250202&text=Halo%20%22Pedangang%20Jujur%22%20saya%20ingin%20membeli%20*'.$productName.'*%20dengan%20jumlah%20*'.$jumlah.'*.%20');
        //adit
        return Redirect()->away('https://api.whatsapp.com/send?phone=62 852-0342-7470&text=Halo%20%22Pedangang%20Jujur%22%20saya%20ingin%20membeli%20*'.$productName.'*%20dengan%20jumlah%20*'.$jumlah.'*.%20');
    }
}

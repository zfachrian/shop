<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\Product;

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
        return view('back.product.create');
    }

}

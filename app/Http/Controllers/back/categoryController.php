<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class categoryController extends Controller
{

    public function index()
    {
        return view('back.category.index');
    }

    public function create()
    {
        return view('back.category.create');
    }

    
}

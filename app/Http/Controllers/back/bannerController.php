<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Models\Banner;

class bannerController extends Controller
{

    public function index()
    {
        $data   =   Banner::get();
        return view('back.banner.index', compact('data'));
    }

    public function create()
    {
        return view('back.banner.create');
    }
    
    public function store(Request $request)
    {
        // Form Validate
        $request->validate([
            'nama_banner' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG|required|file|max:2000',
        ]);

        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('banner', 'public');
        } else {
            $gambar = null;
        }

        // Eloquent ORM
        $banner = new Banner;
        $banner->banner_title = $request->nama_banner;
        $banner->banner_image = $gambar;
        $banner->banner_link = $request->lik_banner;
        $banner->save();

        return redirect()->route('back.banner.index')->with('success', 'Banner was created!');
    }

    public function edit(Banner $banner)
    {
        return view('back.banner.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        // Form Validate
        $request->validate([
            'nama_banner' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG|required|file|max:2000',
        ]);

        // Eloquent ORM
        $banner = Banner::findOrFail($banner->id);
            if($request->file('gambar')){
                $gambar = $request->file('gambar')->store('banner', 'public');
                if($banner->banner_image){
                    Storage::delete('public/'.$banner->banner_image);
                    $banner->banner_image = $gambar;
                }else{
                    $banner->banner_image = $gambar;
                }
            }
        $banner->banner_title = $request->nama_banner;
        $banner->banner_link = $request->link_banner;
        $banner->save();
        
        return redirect()->route('back.banner.index')->with('success', 'Banner was update!');
    }

    public function destroy(Banner $banner)
    {
        if($banner->banner_image){
            Storage::delete('public/'.$banner->banner_image);
        }
        Banner::destroy($banner->id);
        return redirect()->route('back.banner.index')->with('success', 'Banner was delete!');
    }

}

<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Models\News;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class newsController extends Controller
{

    public function index()
    {
        $data   =   News::get();
        return view('back.news.index', compact('data'));
    }

    public function create()
    {
        return view('back.news.create');
    }
    
    public function store(Request $request)
    {
        // Form Validate
        $request->validate([
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
            'thumbnail' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
        ]);

        if($request->file('gambar')){
            $gambar = $request->file('gambar')->store('news', 'public');
        } else {
            $gambar = null;
        }

        if($request->file('thumbnail')){
            $thumbnail = $request->file('thumbnail')->store('news/thumbnail', 'public');
        } else {
            $thumbnail = null;
        }

        // Eloquent ORM
        $news = new News;
        $news->slug = Str::slug($request->judul_berita, '-').'-'.rand(1000,9999);
        $news->news_title = $request->judul_berita;
        $news->news_content = $request->isi_berita;
        $news->news_thumbnail = $thumbnail;
        $news->news_image = $gambar;
        $news->tags = implode(', ', $request->tag);
        $news->save();

        return redirect()->route('back.news.index')->with('success', 'News was created!');
    }

    public function edit(News $news)
    {
        return view('back.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {

        // Form Validate
        $request->validate([
            'judul_berita' => 'required',
            'isi_berita' => 'required',
            'gambar' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
            'thumbnail' => 'mimes:jpg,png,jpeg,JPG,PNG,JPEG',
        ]);

        // Eloquent ORM
        $news = News::findOrFail($news->id);
            if($request->file('gambar')){
                $gambar = $request->file('gambar')->store('news', 'public');
                if($news->news_image){
                    Storage::delete('public/'.$news->news_image);
                    $news->news_image = $gambar;
                }else{
                    $news->news_image = $gambar;
                }
            }
            if($request->file('thumbnail')){
                $thumbnail = $request->file('thumbnail')->store('news/thumbnail', 'public');
                if($news->news_thumbnail){
                    Storage::delete('public/'.$news->news_thumbnail);
                    $news->news_thumbnail = $thumbnail;
                }else{
                    $news->news_thumbnail = $thumbnail;
                }
            }
            $last = Arr::last(explode('-', $news->slug), function ($value, $key) {
                return $value;
            });
            if($request->judul_berita == $news->news_title){
                $news->slug = $news->slug;
            }else{
                $news->slug = Str::slug($request->judul_berita, '-').'-'.$last;
            }
        $news->news_title = $request->judul_berita;
        $news->news_content = $request->isi_berita;
        $news->tags = implode(', ', $request->tag);
        $news->save();
        
        return redirect()->route('back.news.index')->with('success', 'News was update!');
    }

    public function destroy(News $news)
    {
        if($news->news_image){
            Storage::delete('public/'.$news->news_image);
        }
        if($news->news_thumbnail){
            Storage::delete('public/'.$news->news_thumbnail);
        }
        News::destroy($news->id);
        return redirect()->route('back.news.index')->with('success', 'News was delete!');
    }

}

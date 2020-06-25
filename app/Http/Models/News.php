<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = [
        'slug', 
        'news_title', 
        'news_title',
        'news_content',
        'news_thumbnail',
        'news_image',
        'news_tags',
    ];

}

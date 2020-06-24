<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $fillable = [
        'banner_title', 
        'banner_image',
        'banner_link'
    ];

}

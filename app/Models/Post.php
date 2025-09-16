<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

     protected $fillable = [
        'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at',
    ];

    use HasFactory;
}

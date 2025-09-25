<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;


class Post extends Model
{
 public function user(){
     return $this->belongsTo(User::class);
 }

 public function category(){
     return $this->belongsTo(Category::class);
 }

 public function claps(){
     return $this->hasMany(Clap::class);
 }

 public function readTime($wordsPerMinute = 100){
     $wordCount = str_word_count(strip_tags($this->content));
     $minutes = ceil($wordCount / $wordsPerMinute);
     return max(1, $minutes);
 }
     protected $fillable = [
        'image',
        'title',
        'slug',
        'content',
        'category_id',
        'user_id',
        'published_at',
    ];


    public function imageUrl(){
        if($this->image){
            return Storage::url($this->image);
        }
        return null;
    }

    use HasFactory;
}

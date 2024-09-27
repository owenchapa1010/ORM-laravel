<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }
    
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function image(){
        return $this->morphOne(Image::class,'imageable');
    }
    public function tags(){
        return $this->morphToMany(Tag::class,'taggable');
    }
    public function comments(){
        return $this->morphMany(Comment::class,'commentable');
    }

    use HasFactory;
}

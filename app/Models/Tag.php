<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
        public function tag(){
        return $this->morphToMany(Post::class,'taggable');
    }
        public function videos(){
        return $this->morphedByMany(video ::class,'taggable');
    }
    use HasFactory;
}

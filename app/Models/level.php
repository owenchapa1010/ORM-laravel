<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    public function users(){
        return $this->hasMany(User::class);
    }
    use HasFactory;
}

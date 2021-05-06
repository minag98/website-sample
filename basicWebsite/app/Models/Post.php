<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table="posts";
    public function Category(){
        return $this->belongsTo(category::class,'category_id');
    }
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}

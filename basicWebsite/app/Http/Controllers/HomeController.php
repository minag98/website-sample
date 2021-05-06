<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Post;
class HomeController extends Controller
{
    public function details(){
        $posts=Post::latest()->paginate(1);
        $l_posts=Post::latest()->take(3)->get();
        return view('home',compact('posts','l_posts'));
    }
}

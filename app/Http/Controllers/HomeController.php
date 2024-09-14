<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sensiple\Blog\App\Models\Post;


class HomeController extends Controller
{
    public function home()
    {
        $blogs = Post::with('categories')->where('post_type', 'blog')->where('visibility', 'public')->orderBy('id', 'desc')->take(3)->get();
        return view('home', compact('blogs'));
    }
}

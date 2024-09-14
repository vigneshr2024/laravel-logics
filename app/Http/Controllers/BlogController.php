<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sensiple\Blog\App\Models\Post;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function blogs()
    {
        $blogs = Post::with('authors', 'industries', 'stacks')->where('post_type', 'blog')->where('visibility', 'public')->orderBy('id', 'desc')->get();
        return view('all-blogs', compact('blogs'));
    }
    public function blogDetails($slug)
    {
        $blog = Post::with('categories', 'authors', 'tags', 'industries', 'stacks')->where('post_url', $slug)->get();
        return view('blog', compact('blog'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

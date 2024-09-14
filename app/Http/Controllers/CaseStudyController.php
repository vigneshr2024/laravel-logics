<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sensiple\Blog\App\Models\Post;

class CaseStudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function casestudy()
    {
        $defaultCaseStudy = Post::with('categories', 'authors', 'tags', 'industries', 'stacks')->where('is_default', '1')->where('post_type', 'case_study')->first();
        return view('casestudy', compact('defaultCaseStudy'));
    }

    public function casestudyDetails($slug)
    {
        $casestudy = Post::with('categories', 'authors', 'tags', 'industries', 'stacks')->where('post_url', $slug)->first();
        return view('single-casestudy', compact('casestudy'));
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

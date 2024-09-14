<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sensiple\Blog\App\Models\Policy;

class PolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function privacypolicy()
    {
        $policies = Policy::where('type', 'privacy-policy')->orderBy('id', 'desc')->first();
        return view('privacy-policy', compact('policies'));
    }

    public function supportpolicy()
    {
        $policies = Policy::where('type', 'support-policy')->orderBy('id', 'desc')->first();
        return view('support-policy', compact('policies'));
    }

    public function termsconditions()
    {
        $policies = Policy::where('type', 'terms&conditions')->orderBy('id', 'desc')->first();
        return view('terms-conditions', compact('policies'));
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

<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sensiple\Blog\App\Models\SeoManagement;
use Illuminate\Support\Facades\Auth;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('SEO Management Menu') == false) {
            abort(401);
        }
        $seo = SeoManagement::first();
        return view('blog::admin.seo.seo', compact('seo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('blog::admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(SeoManagement $seo)
    {
        return view('blog::admin.seo.edit', compact('seo'));
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
    public function update(Request $request, SeoManagement $seo)
    {

        $request->validate([
            'sitemap_file_location' => 'nullable|file',
            'robots_file_location' => 'nullable|file',
        ]);

        if ($request->hasFile('sitemap_file_location')) {
            $sitemapName = 'sitemap.' . $request->file('sitemap_file_location')->getClientOriginalExtension();
            $filePath = $request->file('sitemap_file_location')->move(public_path('/'), $sitemapName);
            $seo->sitemap_file_location = $sitemapName;
            $seo->sitemap_updated_at = now()->toDateTimeString();
        }

        if ($request->hasFile('robots_file_location')) {
            $robotsName = 'robots.' . $request->file('robots_file_location')->getClientOriginalExtension();
            $filePath = $request->file('robots_file_location')->move(public_path('/'), $robotsName);
            $seo->robots_file_location = $robotsName;
            $seo->robots_updated_at = now()->toDateTimeString();
        }

        $seo->header_tags = $request->header_tags;

        if ($seo->isDirty('header_tags')) {
            $seo->header_tags_updated_at = now()->toDateTimeString();
        }
        $seo->footer_tags = $request->footer_tags;
        if ($seo->isDirty('footer_tags')) {
            $seo->footer_tags_updated_at = now()->toDateTimeString();
        }
        $seo->updated_by = Auth::id();
        $seo->save();
        $request->session()->put('message', 'SEO updated successfully!');
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

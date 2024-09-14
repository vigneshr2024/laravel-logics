<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Sensiple\Blog\App\Models\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('Tags List') == false) {
            abort(401);
        }
        $tags = Tag::paginate(20);
        return view('blog::admin.tag.list', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Tag Create') == false) {
            abort(401);
        }
        return view('blog::admin.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Tag Create') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|unique:tags,name|max:255',
        ]);
        $slug = Str::slug(strtolower($request->name), '_');

        if (Tag::where('slug', $slug)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The slug has already been taken.']);
        }
        $tag       = new Tag();
        $tag->name = $request->name;
        $tag->slug = $slug;
        $tag->save();
        session()->flash('message', 'Tag created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Tag $tag)
    {
        if (auth()->user()->can('Tag Edit') == false) {
            abort(401);
        }
        return view('blog::admin.tag.edit', compact('tag'));
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
    public function update(Request $request, Tag $tag)
    {
        if (auth()->user()->can('Tag Edit') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|max:255|unique:tags,name,' . $tag->id,
            'description' => 'nullable|max:1000',
        ]);
        $slug = Str::slug(strtolower($request->name), '_');

        if (Tag::where('slug', $slug)->where('id', '!=', $tag->id)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The generated slug has already been taken.']);
        }
        $tag->name = $request->name;
        $tag->slug = $slug;
        $tag->save();
        session()->flash('message', 'Tag updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Tag $tag)
    {
        if (auth()->user()->can('Tag Delete') == false) {
            abort(401);
        }
        $tag->delete();
        session()->flash('message', 'Tag deleted successfully!');
        return redirect()->back();
    }
}

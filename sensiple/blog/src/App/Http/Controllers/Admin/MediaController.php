<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Sensiple\Blog\App\Models\Media;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('Social Media List') == false) {
            abort(401);
        }
        $medias = Media::paginate(20);
        return view('blog::admin.media.list', compact('medias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Social Media Create') == false) {
            abort(401);
        }
        return view('blog::admin.media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Social Media Create') == false) {
            abort(401);
        }
        $media       = new Media();
        $media->facebook = $request->facebook;
        $media->instagram = $request->instagram;
        $media->twitter = $request->twitter;
        $media->linkedin = $request->linkedin;
        $media->youtube = $request->youtube;
        $media->save();
        session()->flash('message', 'Media created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Media $media, $medium)
    {
        if (auth()->user()->can('Social Media Edit') == false) {
            abort(401);
        }
        $media = Media::findOrFail($medium);
        return view('blog::admin.media.edit', compact('media'));
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
    public function update(Request $request, $medium, Media $media)
    {
        if (auth()->user()->can('Social Media Edit') == false) {
            abort(401);
        }
        $media = Media::findOrFail($medium);
        $request->validate([
            'facebook' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
        ]);
        $media->facebook = $request->facebook;
        $media->instagram = $request->instagram;
        $media->twitter = $request->twitter;
        $media->linkedin = $request->linkedin;
        $media->youtube = $request->youtube;
        $media->save();
        session()->flash('message', 'Media updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Media $media, $medium)
    {
        if (auth()->user()->can('Social Media Delete') == false) {
            abort(401);
        }
        $media = Media::findOrFail($medium);
        $media->delete();
        session()->flash('message', 'Media deleted successfully!');
        return redirect()->back();
    }
}

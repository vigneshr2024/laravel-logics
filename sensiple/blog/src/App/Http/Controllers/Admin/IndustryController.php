<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Sensiple\Blog\App\Models\Industry;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndustryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('Industries List') == false) {
            abort(401);
        }
        $industries = Industry::paginate(20);
        return view('blog::admin.industry.list', compact('industries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Industry Create') == false) {
            abort(401);
        }
        return view('blog::admin.industry.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Industry Create') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|unique:industries,name|max:255',
            'description' => 'nullable|max:1000',
        ]);
        $slug = Str::slug(strtolower($request->name), '_');

        if (Industry::where('slug', $slug)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The slug has already been taken.']);
        }
        $industry       = new Industry();
        $industry->name = $request->name;
        $industry->slug = $slug;
        $industry->description = $request->description;
        $industry->save();
        session()->flash('message', 'Industry created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Industry $industry)
    {
        if (auth()->user()->can('Industry Edit') == false) {
            abort(401);
        }
        return view('blog::admin.industry.edit', compact('industry'));
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
    public function update(Request $request, Industry $industry)
    {
        if (auth()->user()->can('Industry Edit') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|max:255|unique:industries,name,' . $industry->id,
            'description' => 'nullable|max:1000',
        ]);
        $slug = Str::slug(strtolower($request->name), '_');

        if (Industry::where('slug', $slug)->where('id', '!=', $industry->id)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The generated slug has already been taken.']);
        }
        $industry->name = $request->name;
        $industry->slug = $slug;
        $industry->description = $request->description;
        $industry->save();
        session()->flash('message', 'Industry updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Industry $industry)
    {
        if (auth()->user()->can('Industry Delete') == false) {
            abort(401);
        }
        $industry->delete();
        session()->flash('message', 'Industry deleted successfully!');
        return redirect()->back();
    }
}

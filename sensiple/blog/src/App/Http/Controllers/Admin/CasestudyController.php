<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Sensiple\Blog\App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CasestudyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $casestudies = CaseStudy::paginate(20);
        return view('blog::admin.casestudy.list', compact('casestudies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog::admin.casestudy.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
            'description' => 'nullable|max:1000',
        ]);
        $slug = Str::slug(strtolower($request->name), '_');

        if (CaseStudy::where('slug', $slug)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The slug has already been taken.']);
        }
        $casestudy       = new CaseStudy();
        $casestudy->name = $request->name;
        $casestudy->slug = $slug;
        $casestudy->description = $request->description;
        $casestudy->save();
        session()->flash('message', 'CaseStudy created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(CaseStudy $casestudy)
    {
        return view('blog::admin.casestudy.edit', compact('casestudy'));
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
    public function update(Request $request, CaseStudy $casestudy)
    {
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $casestudy->id,
            'description' => 'nullable|max:1000',
        ]);
        $slug = Str::slug(strtolower($request->name), '_');

        if (CaseStudy::where('slug', $slug)->where('id', '!=', $casestudy->id)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The generated slug has already been taken.']);
        }
        $casestudy->name = $request->name;
        $casestudy->slug = $slug;
        $casestudy->description = $request->description;
        $casestudy->save();
        session()->flash('message', 'CaseStudy updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, CaseStudy $casestudy)
    {
        $casestudy->delete();
        session()->flash('message', 'CaseStudy deleted successfully!');
        return redirect()->back();
    }
}

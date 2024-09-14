<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use Sensiple\Blog\App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('Categories List') == false) {
            abort(401);
        }
        $categories = Category::paginate(20);
        return view('blog::admin.category.list', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Category Create') == false) {
            abort(401);
        }
        return view('blog::admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Category Create') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|unique:categories,name|max:255',
            'description' => 'nullable|max:1000',
        ]);
        $slug = Str::slug(strtolower($request->name), '_');

        if (Category::where('slug', $slug)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The slug has already been taken.']);
        }
        $category       = new Category();
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->save();
        session()->flash('message', 'Category created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        if (auth()->user()->can('Category Edit') == false) {
            abort(401);
        }
        return view('blog::admin.category.edit', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        if (auth()->user()->can('Category Edit') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|max:255|unique:categories,name,' . $category->id,
            'description' => 'nullable|max:1000',
        ]);
        $slug = Str::slug(strtolower($request->name), '_');

        if (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The generated slug has already been taken.']);
        }
        $category->name = $request->name;
        $category->slug = $slug;
        $category->description = $request->description;
        $category->save();
        session()->flash('message', 'Category updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Category $category)
    {
        if (auth()->user()->can('Category Delete') == false) {
            abort(401);
        }
        $category->delete();
        session()->flash('message', 'Category deleted successfully!');
        return redirect()->back();
    }
}

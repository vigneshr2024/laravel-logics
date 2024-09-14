<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Sensiple\Blog\App\Models\Stack;

class StackController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('Stacks List') == false) {
            abort(401);
        }
        $stacks = Stack::paginate(20);
        return view('blog::admin.stack.list', compact('stacks'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Stack Create') == false) {
            abort(401);
        }
        return view('blog::admin.stack.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Stack Create') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|unique:stacks,name|max:255',
            'description' => 'nullable|max:1000',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $slug = Str::slug(strtolower($request->name), '-');

        if (Stack::where('slug', $slug)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The slug has already been taken.']);
        }
        $stack       = new Stack();
        $stack->name = $request->name;
        $stack->slug = $slug;
        $stack->description = $request->description;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $originalName = $file->getClientOriginalName();

            $storage = new StorageClient([
                'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
            ]);

            $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                'name' => 'stacks/' . $originalName,
                'metadata' => [
                    'contentType' => $file->getClientMimeType(),
                ],
            ]);

            $stack->icon = 'https://storage.googleapis.com/cloudsens-cs-001/stacks/' . $originalName;
        }
        $stack->save();
        session()->flash('message', 'Stack created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Stack $stack)
    {
        if (auth()->user()->can('Stack Edit') == false) {
            abort(401);
        }
        return view('blog::admin.stack.edit', compact('stack'));
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
    public function update(Request $request, Stack $stack)
    {
        if (auth()->user()->can('Stack Edit') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|max:255|unique:stacks,name,' . $stack->id,
            'description' => 'nullable|max:1000',
            'icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $slug = Str::slug(strtolower($request->name), '-');

        if (Stack::where('slug', $slug)->where('id', '!=', $stack->id)->exists()) {
            return redirect()->back()->withErrors(['slug' => 'The generated slug has already been taken.']);
        }
        $stack->name = $request->name;
        $stack->slug = $slug;
        $stack->description = $request->description;
        if ($request->hasFile('icon')) {
            $file = $request->file('icon');
            $originalName = $file->getClientOriginalName();

            $storage = new StorageClient([
                'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
            ]);

            $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                'name' => 'stacks/' . $originalName,
                'metadata' => [
                    'contentType' => $file->getClientMimeType(),
                ],
            ]);

            $stack->icon = 'https://storage.googleapis.com/cloudsens-cs-001/stacks/' . $originalName;
        }
        $stack->save();
        session()->flash('message', 'Stack updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Stack $stack)
    {
        if (auth()->user()->can('Stack Delete') == false) {
            abort(401);
        }
        $stack->delete();
        session()->flash('message', 'Stack deleted successfully!');
        return redirect()->back();
    }
}

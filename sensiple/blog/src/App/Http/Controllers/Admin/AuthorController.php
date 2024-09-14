<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Sensiple\Blog\App\Models\Author;
use App\Http\Controllers\Controller;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AuthorController extends Controller
{
    // protected $storageClient;
    // protected $bucket;

    // public function __construct(StorageClient $storageClient)
    // {
    //     $this->storageClient = $storageClient;
    //     // dd($this->storageClient);
    //     $this->bucket = $this->storageClient->bucket(env('GOOGLE_CLOUD_STORAGE_BUCKET'));
    // }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('Authors List') == false) {
            abort(401);
        }
        $authors = Author::paginate(20);
        return view('blog::admin.author.list', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Author Create') == false) {
            abort(401);
        }
        return view('blog::admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Author Create') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $author       = new Author();
        $author->name = $request->name;
        $author->description = $request->description;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $originalName = $file->getClientOriginalName();

            $storage = new StorageClient([
                'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
            ]);

            $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                'name' => 'author-profile/' . $originalName,
                'metadata' => [
                    'contentType' => $file->getClientMimeType(),
                ],
            ]);

            $author->profile_image = 'https://storage.googleapis.com/cloudsens-cs-001/author-profile/' . $originalName;
        }
        $author->status = $request->status;
        $author->created_by  = Auth::id();
        $author->updated_by = Auth::id();
        $author->save();
        return redirect()->back()->with('message', 'Author created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Author $author)
    {
        if (auth()->user()->can('Author Edit') == false) {
            abort(401);
        }
        return view('blog::admin.author.edit', compact('author'));
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
    public function update(Request $request, Author $author)
    {
        if (auth()->user()->can('Author Edit') == false) {
            abort(401);
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:active,inactive'
        ]);

        $author->name = $request->name;
        $author->description = $request->description;
        if ($request->hasFile('profile_image')) {
            $file = $request->file('profile_image');
            $originalName = $file->getClientOriginalName();

            $storage = new StorageClient([
                'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
            ]);

            $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                'name' => 'author-profile/' . $originalName,
                'metadata' => [
                    'contentType' => $file->getClientMimeType(),
                ],
            ]);

            $author->profile_image = 'https://storage.googleapis.com/cloudsens-cs-001/author-profile/' . $originalName;
        }
        $author->status = $request->status;
        $author->save();
        session()->flash('message', 'Author updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Author $author)
    {
        if (auth()->user()->can('Author Delete') == false) {
            abort(401);
        }
        $author->delete();
        session()->flash('message', 'Author deleted successfully!');
        return redirect()->back();
    }
}

<?php

namespace Sensiple\Blog\App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Sensiple\Blog\App\Models\Author;
use Sensiple\Blog\App\Models\Category;
use Sensiple\Blog\App\Models\Industry;
use Sensiple\Blog\App\Models\Post;
use Sensiple\Blog\App\Models\PostAuthor;
use Sensiple\Blog\App\Models\PostCategory;
use Sensiple\Blog\App\Models\PostIndustry;
use Sensiple\Blog\App\Models\PostStack;
use Sensiple\Blog\App\Models\PostTag;
use Sensiple\Blog\App\Models\Stack;
use Sensiple\Blog\App\Models\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->can('List Post') == false) {
            abort(401);
        }
        $posts = Post::with('authors')->paginate(20);
        return view('blog::admin.post.list', compact('posts'));
    }

    public function caseStudy($id)
    {
        Post::where('post_type', 'case_study')->where('is_default', 1)->update(['is_default' => 0]);
        Post::where('id', $id)->where('is_default', 0)->update(['is_default' => 1]);
        session()->flash('message', "Default Case Study is Selected");
        return redirect()->back();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (auth()->user()->can('Create Post') == false) {
            abort(401);
        }
        $industries = Industry::orderBy('id', 'desc')->get(['id', 'name']);
        $tags       = Tag::orderBy('id', 'desc')->get(['id', 'name']);
        $categories = Category::orderBy('id', 'desc')->get(['id', 'name']);
        $authors    = Author::orderBy('id', 'desc')->get(['id', 'name']);
        $stacks    = Stack::orderBy('id', 'desc')->get(['id', 'name']);
        return view('blog::admin.post.create', compact('industries', 'tags', 'categories', 'authors', 'stacks'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (auth()->user()->can('Create Post') == false) {
            abort(401);
        }
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'publish_date' => 'required|date',
            'visibility' => 'required|string|in:public,private',
            'post_type'  => 'required|string|in:blog,case_study',
            'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $post_url = Str::slug(strtolower($request->title), '-');

        if (Post::where('post_url', $post_url)->first()) {
            session()->flash('message', 'Post Url Already exists Please check!');
            session()->flash('alert-type', 'danger'); // or 'danger', 'warning', etc.
            return redirect()->back();
        }
        DB::transaction(function () use ($request, $post_url) {

            $post       = new Post();
            $post->title = $request->title;
            $post->short_description = $request->short_description;
            if ($request->hasFile('thumbnail_image')) {
                $file = $request->file('thumbnail_image');
                $originalName = $file->getClientOriginalName();

                $storage = new StorageClient([
                    'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                    'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
                ]);

                $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                    'name' => 'blogs/thumbnail_image/' . $originalName,
                    'metadata' => [
                        'contentType' => $file->getClientMimeType(),
                    ],
                ]);

                $post->thumbnail_image = 'https://storage.googleapis.com/cloudsens-cs-001/blogs/thumbnail_image/' . $originalName;
            }
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $originalName = $file->getClientOriginalName();

                $storage = new StorageClient([
                    'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                    'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
                ]);

                $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                    'name' => 'blogs/banner_image/' . $originalName,
                    'metadata' => [
                        'contentType' => $file->getClientMimeType(),
                    ],
                ]);

                $post->banner_image = 'https://storage.googleapis.com/cloudsens-cs-001/blogs/banner_image/' . $originalName;
            }
            $post->content = $request->content;
            $post->publish_date = $request->publish_date;
            $post->post_url = $post_url;
            $post->visibility = $request->visibility;
            $post->post_type = $request->post_type;
            $post->client = $request->client;
            $post->location = $request->location;
            $post->save();

            if (isset($request->authors_ids) && count($request->authors_ids) > 0) {
                foreach ($request->authors_ids as $key => $author) {
                    $postAuthor    = new PostAuthor();
                    $postAuthor->post_id  = $post->id;
                    $postAuthor->author_id  = $author;
                    $postAuthor->created_by  = Auth::id();
                    $postAuthor->updated_by  = Auth::id();
                    $postAuthor->save();
                }
            }
            if (isset($request->industry_ids) && count($request->industry_ids) > 0) {
                foreach ($request->industry_ids as $key => $industry) {
                    $postIndustry    = new PostIndustry();
                    $postIndustry->post_id  = $post->id;
                    $postIndustry->industry_id  = $industry;
                    $postIndustry->created_by  = Auth::id();
                    $postIndustry->updated_by  = Auth::id();
                    $postIndustry->save();
                }
            }
            if (isset($request->tag_ids) && count($request->tag_ids) > 0) {
                foreach ($request->tag_ids as $key => $tag) {
                    $postTag    = new PostTag();
                    $postTag->post_id  = $post->id;
                    $postTag->tag_id  = $tag;
                    $postTag->created_by  = Auth::id();
                    $postTag->updated_by  = Auth::id();
                    $postTag->save();
                }
            }
            if (isset($request->category_ids) && count($request->category_ids) > 0) {
                foreach ($request->category_ids as $key => $category) {
                    $postCategory    = new PostCategory();
                    $postCategory->post_id  = $post->id;
                    $postCategory->category_id  = $category;
                    $postCategory->created_by  = Auth::id();
                    $postCategory->updated_by  = Auth::id();
                    $postCategory->save();
                }
            }
            if (isset($request->stack_ids) && count($request->stack_ids) > 0) {
                foreach ($request->stack_ids as $key => $stack) {
                    $postStack    = new PostStack();
                    $postStack->post_id  = $post->id;
                    $postStack->stack_id  = $stack;
                    $postStack->created_by  = Auth::id();
                    $postStack->updated_by  = Auth::id();
                    $postStack->save();
                }
            }
        });

        session()->flash('message', 'Post created successfully!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        if (auth()->user()->can('Edit Post') == false) {
            abort(401);
        }
        $industries = Industry::orderBy('id', 'desc')->get(['id', 'name']);
        $tags       = Tag::orderBy('id', 'desc')->get(['id', 'name']);
        $categories = Category::orderBy('id', 'desc')->get(['id', 'name']);
        $authors    = Author::orderBy('id', 'desc')->get(['id', 'name']);
        $stacks    = Stack::orderBy('id', 'desc')->get(['id', 'name']);
        return view('blog::admin.post.edit', compact('post', 'industries', 'tags', 'categories', 'authors', 'stacks'));
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
    public function update(Request $request, Post $post)
    {
        if (auth()->user()->can('Edit Post') == false) {
            abort(401);
        }
        // return $request;
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'short_description' => 'nullable|string|max:255',
            'publish_date' => 'required|date',
            'visibility' => 'required|string|in:public,private',
            'post_type'  => 'required|string|in:blog,case_study',
        ]);
        if ($request->hasFile('thumbnail_image')) {
            $validatedData = $request->validate([
                'thumbnail_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
        }
        if ($request->hasFile('banner_image')) {
            $validatedData = $request->validate([
                'banner_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

            ]);
        }
        $post_url = Str::slug(strtolower($request->title), '-');

        if (Post::where('id', '!=', $post->id)->where('post_url', $post_url)->first()) {
            session()->flash('message', 'Post Url Already exists Please check!');
            session()->flash('alert-type', 'danger'); // or 'danger', 'warning', etc.

            return redirect()->back();
        }
        DB::transaction(function () use ($request, $post_url, $post) {

            $post->title = $request->title;
            $post->short_description = $request->short_description;
            if ($request->hasFile('thumbnail_image')) {
                $file = $request->file('thumbnail_image');
                $originalName = $file->getClientOriginalName();

                $storage = new StorageClient([
                    'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                    'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
                ]);

                $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                    'name' => 'blogs/thumbnail_image/' . $originalName,
                    'metadata' => [
                        'contentType' => $file->getClientMimeType(),
                    ],
                ]);

                $post->thumbnail_image = 'https://storage.googleapis.com/cloudsens-cs-001/blogs/thumbnail_image/' . $originalName;
            }
            if ($request->hasFile('banner_image')) {
                $file = $request->file('banner_image');
                $originalName = $file->getClientOriginalName();

                $storage = new StorageClient([
                    'projectId' => env('GOOGLE_CLOUD_PROJECT_ID'),
                    'keyFilePath' => base_path('cloudsensai-prod-890d25b6f8d0.json'),
                ]);

                $storage->bucket('cloudsens-cs-001')->upload(fopen($file->getRealPath(), 'r'), [
                    'name' => 'blogs/banner_image/' . $originalName,
                    'metadata' => [
                        'contentType' => $file->getClientMimeType(),
                    ],
                ]);

                $post->banner_image = 'https://storage.googleapis.com/cloudsens-cs-001/blogs/banner_image/' . $originalName;
            }
            $post->content = $request->content;
            $post->publish_date = $request->publish_date;
            $post->post_url = $post_url;
            $post->visibility = $request->visibility;
            $post->post_type = $request->post_type;
            $post->client = $request->client;
            $post->location = $request->location;

            if ($post->isDirty()) {
                $post->save();
            }

            if (isset($request->authors_ids) && count($request->authors_ids) > 0) {
                foreach ($request->authors_ids as $key => $author) {
                    $authorIds[$author] = [
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                    ];
                }
                $post->authors()->sync($authorIds);
            }
            if (isset($request->industry_ids) && count($request->industry_ids) > 0) {
                foreach ($request->industry_ids as $key => $industry) {
                    $industryIds[$industry] = [
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                    ];
                }
                $post->industries()->sync($industryIds);
            }
            if (isset($request->tag_ids) && count($request->tag_ids) > 0) {
                foreach ($request->tag_ids as $key => $tag) {
                    $tagIds[$tag] = [
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                    ];
                }
                $post->tags()->sync($tagIds);
            }
            if (isset($request->category_ids) && count($request->category_ids) > 0) {
                foreach ($request->category_ids as $key => $category) {
                    $categoryIds[$category] = [
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                    ];
                }
                $post->categories()->sync($categoryIds);
            }
            if (isset($request->stack_ids) && count($request->stack_ids) > 0) {
                foreach ($request->stack_ids as $key => $stack) {
                    $stackIds[$stack] = [
                        'created_by' => Auth::id(),
                        'updated_by' => Auth::id(),
                    ];
                }
                $post->stacks()->sync($stackIds);
            }
        });
        session()->flash('message', 'Post updated successfully!');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Post $post)
    {
        if (auth()->user()->can('Delete Post') == false) {
            abort(401);
        }
        $post->delete();
        session()->flash('message', 'Post deleted successfully!');
        return redirect()->back();
    }
}

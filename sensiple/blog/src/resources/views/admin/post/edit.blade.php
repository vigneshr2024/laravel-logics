@extends('user::admin.layout.app')
@section('title', 'Post Edit')
@section('page-css')
    <!-- Bootstrap CSS -->
    {{-- <link
     href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
     rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
@endsection
@section('page-script')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                // placeholder: 'Hello Bootstrap 5',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection
@section('content')
    <section class="section">
        @include('user::admin.layout.message')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Posts List
                            @if (auth()->user()->can('List Post'))
                                <a href="{{ url('blog/admin/post') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/post') }}/{{ $post->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Edit Post </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control mt-1" id=""
                                        value="{{ old('title', $post->title) }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="post_url">Post URL</label>
                                    <input type="text" name="post_url" class="form-control mt-1" id=""
                                        value="{{ old('post_url', $post->post_url) }}" readonly>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="short_description">Short Description</label>
                                    <input type="text" name="short_description" class="form-control mt-1" id=""
                                        value="{{ old('short_description', $post->short_description) }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <div class="row">
                                        <div class="col">
                                            <label for="image">Thumbnail Image</label>
                                            <input type="file" name="thumbnail_image" id="image"
                                                class="form-control">
                                        </div>
                                        <div class="col">
                                            <img src="{{ asset($post->thumbnail_image) }}" height="100" width="200"
                                                alt="" srcset="">
                                        </div>
                                    </div>

                                </div>
                                <div class="form-group p-1 m-1">
                                    <div class="row">
                                        <div class="col">
                                            <label for="image">Banner Image</label>
                                            <input type="file" name="banner_image" id="image" class="form-control">
                                        </div>
                                        <div class="col">
                                            <img src="{{ asset($post->banner_image) }}" height="100" width="200"
                                                alt="" srcset="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <div class="container-fluid">
                                        <label for="content">Content</label>
                                        <textarea id="content" name="content">{{ old('content', $post->content) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="publish_date">Publish Date</label>
                                    <input type="date" name="publish_date" class="form-control mt-1" id=""
                                        value="{{ old('publish_date', $post->publish_date) }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="author">Author</label>
                                    <select name="authors_ids[]" class="form-control" id="" multiple>
                                        @foreach ($authors as $author)
                                            <option value="{{ $author->id }}"
                                                @if (isset($post->authors) && count($post->authors) > 0) @if (in_array($author->id, $post->authors->pluck('id')->toArray()))
                                                        selected @endif
                                                @endif
                                                >{{ $author->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="visibility">Visibility</label>
                                    <select name="visibility" class="form-control" id="">
                                        <option value="">SELECT Post Type</option>
                                        <option value="public"
                                            @if ($post->visibility == 'public') @selected(true) @endif>Public
                                        </option>
                                        <option value="private"
                                            @if ($post->visibility == 'private') @selected(true) @endif>Private
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="industry">Industries</label>
                                    <select name="industry_ids[]" class="form-control" id="" multiple>
                                        @foreach ($industries as $industry)
                                            <option value="{{ $industry->id }}"
                                                @if (isset($post->industries) && count($post->industries) > 0) @if (in_array($industry->id, $post->industries->pluck('id')->toArray()))
                                                        selected @endif
                                                @endif
                                                >{{ $industry->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="tag">Tags</label>
                                    <select name="tag_ids[]" class="form-control" id="" multiple>
                                        @foreach ($tags as $tag)
                                            <option value="{{ $tag->id }}"
                                                @if (isset($post->tags) && count($post->tags) > 0) @if (in_array($tag->id, $post->tags->pluck('id')->toArray()))
                                                        selected @endif
                                                @endif
                                                >{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="category">Category</label>
                                    <select name="category_ids[]" class="form-control" id="" multiple>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                @if (isset($post->categories) && count($post->categories) > 0) @if (in_array($category->id, $post->categories->pluck('id')->toArray()))
                                                        selected @endif
                                                @endif
                                                >{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="stack">Stack</label>
                                    <select name="stack_ids[]" class="form-control" id="" multiple>
                                        @foreach ($stacks as $stack)
                                            <option value="{{ $stack->id }}"
                                                @if (isset($post->stacks) && count($post->stacks) > 0) @if (in_array($stack->id, $post->stacks->pluck('id')->toArray()))
                                                        selected @endif
                                                @endif
                                                >{{ $stack->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="client">Client</label>
                                    <input type="text" name="client" class="form-control mt-1" id=""
                                        placeholder="Enter client " value="{{ old('client', $post->client) }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="location">Location</label>
                                    <input type="text" name="location" class="form-control mt-1" id=""
                                        placeholder="Enter location " value="{{ old('location', $post->location) }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="post_type">Post Type</label>
                                    <select name="post_type" class="form-control" id="">
                                        <option value="">SELECT Post Type</option>
                                        <option value="blog"
                                            @if ($post->post_type == 'blog') @selected(true) @endif>Blog
                                        </option>
                                        <option value="case_study"
                                            @if ($post->post_type == 'case_study') @selected(true) @endif>Case
                                            Study</option>
                                    </select>
                                </div>
                            </div>


                            <div class="form-group p-1 m-1">
                                <button type="submit" class="btn btn-primary form-control mt-3">Update</button>
                            </div>

                    </div>
                    </form>

                </div>
            </div>
        </div>
        </div>
    </section>
@endsection

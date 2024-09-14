@extends('user::admin.layout.app')
@section('title', 'Post Create')
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
                    <form action="{{ url('blog/admin/post') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body table-responsive">
                            <h5 class="card-title">Create Post </h5>

                            <div class="form-group p-1 m-1">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control mt-1" id="" placeholder="Enter Title" required title="Please Enter Title Name.">
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="description">Short Description</label>
                                <input type="text" name="short_description" class="form-control mt-1" id=""
                                    placeholder="Enter Short Description">
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="image">Thumbnail Image</label>
                                <input type="file" name="thumbnail_image" id="image" class="form-control" required title="Please select Thumbnail Image.">
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="image">Banner Image</label>
                                <input type="file" name="banner_image" id="image" class="form-control" required title="Please select Banner Image.">
                            </div>
                            <div class="form-group p-1 m-1">
                                <div class="container-fluid">
                                    <label for="content">Content</label>
                                    <textarea id="content" name="content"></textarea>
                                </div>
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="publish_date">Publish Date</label>
                                <input type="date" name="publish_date" class="form-control mt-1" id="" required title="Please select Publish Date.">
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="author">Author</label>
                                <select name="authors_ids[]" class="form-control" id="" multiple>
                                    @foreach ($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="visibility">Visibility</label>
                                <select name="visibility" class="form-control" id="" required title="Please select visibility type.">
                                    <option value="">SELECT Visibility Type</option>
                                    <option value="public">Public</option>
                                    <option value="private">Private</option>
                                </select>
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="industry">Industries</label>
                                <select name="industry_ids[]" class="form-control" id="" multiple>
                                    @foreach ($industries as $industry)
                                    <option value="{{ $industry->id }}">{{ $industry->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="tag">Tags</label>
                                <select name="tag_ids[]" class="form-control" id="" multiple>
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="category">Category</label>
                                <select name="category_ids[]" class="form-control" id="" multiple>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="stack">Stack</label>
                                <select name="stack_ids[]" class="form-control" id="" multiple>
                                    @foreach ($stacks as $stack)
                                    <option value="{{ $stack->id }}">{{ $stack->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="client">Client</label>
                                <input type="text" name="client" class="form-control mt-1" id=""
                                    placeholder="Enter client ">
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="location">Location</label>
                                <input type="text" name="location" class="form-control mt-1" id=""
                                    placeholder="Enter location ">
                            </div>
                            <div class="form-group p-1 m-1">
                                <label for="post_type">Post Type</label>
                                <select name="post_type" class="form-control" id="" required title="Please select post type.">
                                    <option value="">SELECT Post Type</option>
                                    <option value="blog">Blog</option>
                                    <option value="case_study">Case Study</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group p-1 m-1">
                            <button type="submit" class="btn btn-primary form-control mt-3">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
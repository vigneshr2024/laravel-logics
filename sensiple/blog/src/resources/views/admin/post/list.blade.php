@extends('user::admin.layout.app')
@section('title', 'Posts lists')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Posts List
                            @if (auth()->user()->can('Create Post'))
                                <a href="{{ url('blog/admin/post/create') }}" class="btn btn-info text-right">Add+</a>
                            @endif
                        </h5>

                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Thumbnail Image</th>
                                    <th scope="col">Publish Date</th>
                                    <th scope="col">Post URL</th>
                                    <th scope="col">Visibility</th>
                                    <th scope="col">Author </th>
                                    <th scope="col">Post Type</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($posts->count() > 0)
                                    @foreach ($posts as $key => $post)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $post->title }}</td>
                                            <td><img src="{{ asset($post->thumbnail_image) }}" height="100" width="200"
                                                    alt="" srcset=""></td>
                                            <td>{{ $post->publish_date }}</td>
                                            <td>{{ $post->post_url }}</td>
                                            <td>{{ $post->visibility }}</td>
                                            <td>
                                                @if (isset($post->authors) && count($post->authors) > 0)
                                                    {{ implode(',', $post->authors->pluck('name')->toArray()) }}
                                                @else
                                                    No Author Assigned
                                                @endif

                                            </td>
                                            <td>{{ $post->post_type }}</td>
                                            <td>
                                                @if (auth()->user()->can('Edit Post'))
                                                    <a href="{{ url('blog/admin/post') }}/{{ $post->id }}"
                                                        class="btn btn-xs btn-warning">E</a>
                                                @endif
                                                @if (auth()->user()->can('Delete Post'))
                                                    <form action="{{ url('blog/admin/post') }}/{{ $post->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">D</button>
                                                    </form>
                                                @endif
                                                @if (auth()->user()->can('Default CaseStudy'))
                                                    @if ($post->post_type == 'case_study')
                                                        <a href="{{ url('blog/admin/case-study') }}/{{ $post->id }}"
                                                            class="btn btn-xs btn-secondary">MID</a>
                                                    @endif
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $posts->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

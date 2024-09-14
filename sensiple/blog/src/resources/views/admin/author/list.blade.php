@extends('user::admin.layout.app')
@section('title', 'Authors lists')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Authors Lists
                            @if (auth()->user()->can('Author Create'))
                                <a href="{{ url('blog/admin/author/create') }}" class="btn btn-info text-right">Create +</a>
                            @endif
                        </h5>
                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Author Image</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($authors->count() > 0)
                                    @foreach ($authors as $key => $author)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $author->name }}</td>
                                            <td><img src="{{ asset($author->profile_image) }}" height="75" width="75"
                                                    alt="" srcset=""></td>
                                            <td>
                                                @if (auth()->user()->can('Author Edit'))
                                                    <a href="{{ url('blog/admin/author') }}/{{ $author->id }}"
                                                        class="btn btn-xs btn-warning">E</a>
                                                @endif
                                                @if (auth()->user()->can('Author Delete'))
                                                    <form action="{{ url('blog/admin/author') }}/{{ $author->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">D</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $authors->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

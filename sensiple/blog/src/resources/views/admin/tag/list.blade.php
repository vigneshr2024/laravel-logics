@extends('user::admin.layout.app')
@section('title', 'Tags lists')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Tags Lists
                            @if (auth()->user()->can('Tag Create'))
                                <a href="{{ url('blog/admin/tag/create') }}" class="btn btn-info text-right">Create+</a>
                            @endif
                        </h5>

                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($tags->count() > 0)
                                    @foreach ($tags as $key => $tag)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>
                                                @if (auth()->user()->can('Tag Edit'))
                                                    <a href="{{ url('blog/admin/tag') }}/{{ $tag->id }}"
                                                        class="btn btn-xs btn-warning">E</a>
                                                @endif
                                                @if (auth()->user()->can('Tag Delete'))
                                                    <form action="{{ url('blog/admin/tag') }}/{{ $tag->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">D</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $tags->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

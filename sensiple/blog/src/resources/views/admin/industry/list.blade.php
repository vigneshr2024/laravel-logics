@extends('user::admin.layout.app')
@section('title', 'Industries lists')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Industries Lists
                            @if (auth()->user()->can('Industry Create'))
                                <a href="{{ url('blog/admin/industry/create') }}" class="btn btn-info text-right">Create+</a>
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
                                @if ($industries->count() > 0)
                                    @foreach ($industries as $key => $industry)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $industry->name }}</td>
                                            <td>
                                                @if (auth()->user()->can('Industry Edit'))
                                                    <a href="{{ url('blog/admin/industry') }}/{{ $industry->id }}"
                                                        class="btn btn-xs btn-warning">E</a>
                                                @endif
                                                @if (auth()->user()->can('Industry Delete'))
                                                    <form action="{{ url('blog/admin/industry') }}/{{ $industry->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">D</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $industries->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

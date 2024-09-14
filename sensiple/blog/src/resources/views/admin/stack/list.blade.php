@extends('user::admin.layout.app')
@section('title', 'Stacks lists')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Stacks Lists
                            @if (auth()->user()->can('Stack Create'))
                                <a href="{{ url('blog/admin/stack/create') }}" class="btn btn-info text-right">Create+</a>
                            @endif
                        </h5>

                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Icon</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($stacks->count() > 0)
                                    @foreach ($stacks as $key => $stack)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $stack->name }}</td>
                                            <td><img src="{{ asset($stack->icon) }}" height="75" width="75"
                                                    alt="" srcset=""></td>
                                            <td>
                                                @if (auth()->user()->can('Stack Edit'))
                                                    <a href="{{ url('blog/admin/stack') }}/{{ $stack->id }}"
                                                        class="btn btn-xs btn-warning">E</a>
                                                @endif
                                                @if (auth()->user()->can('Stack Delete'))
                                                    <form action="{{ url('blog/admin/stack') }}/{{ $stack->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">D</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $stacks->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

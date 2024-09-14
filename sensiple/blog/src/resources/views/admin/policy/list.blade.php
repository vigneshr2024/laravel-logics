@extends('user::admin.layout.app')
@section('title', 'policy lists')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">policy Lists
                            @if (auth()->user()->can('Policy Create'))
                                <a href="{{ url('admin/policy/create') }}" class="btn btn-info text-right">Create+</a>
                            @endif
                        </h5>

                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col">Policy URL</th>
                                    <th scope="col">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($policies->count() > 0)
                                    @foreach ($policies as $key => $policy)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $policy->title }}</td>
                                            <td>{{ $policy->policy_url }}</td>
                                            <td>{{ $policy->type }}</td>
                                            <td>
                                                @if (auth()->user()->can('Policy Edit'))
                                                    <a href="{{ url('admin/policy') }}/{{ $policy->id }}"
                                                        class="btn btn-xs btn-warning">E</a>
                                                @endif
                                                @if (auth()->user()->can('Policy Delete'))
                                                    <form action="{{ url('admin/policy') }}/{{ $policy->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">D</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $policies->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

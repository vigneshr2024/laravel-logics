@extends('user::admin.layout.app')
@section('title', 'Social Media lists')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Social Media
                            @if (auth()->user()->can('Social Media Create'))
                                <a href="{{ url('blog/admin/media/create') }}" class="btn btn-info text-right">Create+</a>
                            @endif
                        </h5>

                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Facebook</th>
                                    <th scope="col">Instagram</th>
                                    <th scope="col">Twitter</th>
                                    <th scope="col">LinkedIn</th>
                                    <th scope="col">Youtube</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($medias->count() > 0)
                                    @foreach ($medias as $key => $media)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $media->facebook }}</td>
                                            <td>{{ $media->instagram }}</td>
                                            <td>{{ $media->twitter }}</td>
                                            <td>{{ $media->linkedin }}</td>
                                            <td>{{ $media->youtube }}</td>
                                            <td>
                                                @if (auth()->user()->can('Social Media Edit'))
                                                    <a href="{{ url('blog/admin/media') }}/{{ $media->id }}"
                                                        class="btn btn-xs btn-warning">E</a>
                                                @endif
                                                @if (auth()->user()->can('Social Media Delete'))
                                                    <form action="{{ url('blog/admin/media') }}/{{ $media->id }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">D</button>
                                                    </form>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $medias->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

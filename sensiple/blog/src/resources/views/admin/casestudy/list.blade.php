@extends('user::admin.layout.app')
@section('title', 'CaseStudies lists')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">CaseStudies Lists <a href="{{ url('blog/admin/casestudy/create') }}"
                                class="btn btn-info text-right">Create
                                +</a></h5>

                        <table class="table table-responsive table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($casestudies->count() > 0)
                                    @foreach ($casestudies as $key => $casestudy)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $casestudy->name }}</td>
                                            <td>
                                                <a href="{{ url('blog/admin/casestudy') }}/{{ $casestudy->id }}"
                                                    class="btn btn-xs btn-warning">E</a>
                                                <form action="{{ url('blog/admin/casestudy') }}/{{ $casestudy->id }}"
                                                    method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger">D</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    {{ $casestudies->links() }}
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

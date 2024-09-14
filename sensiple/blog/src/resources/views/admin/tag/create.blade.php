@extends('user::admin.layout.app')
@section('title', 'Tag Create')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Tags Lists
                            @if (auth()->user()->can('Tags List'))
                                <a href="{{ url('blog/admin/tag') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/tag') }}" method="post">
                            @csrf
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Create Tag </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control mt-1" id=""
                                        placeholder="Enter Tag Name" value="{{ old('name') }}" required title="Enter your tag name">
                                </div>

                                <div class="form-group p-1 m-1">
                                    <button type="submit" class="btn btn-primary form-control mt-3">Create</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

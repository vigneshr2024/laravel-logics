@extends('user::admin.layout.app')
@section('title', 'Stack Edit')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Stacks Lists
                            @if (auth()->user()->can('Stacks List'))
                                <a href="{{ url('blog/admin/stack') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/stack') }}/{{ $stack->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Edit Stack </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control mt-1" id=""
                                        value="{{ $stack->name }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="name">Stack Description </label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $stack->description }}</textarea>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <div class="row">
                                        <div class="col">
                                            <label for="image">Icon</label>
                                            <input type="file" name="icon" id="image" class="form-control">
                                        </div>
                                        <div class="col">
                                            <img src="{{ asset($stack->icon) }}" height="75" width="75"
                                                alt="" srcset="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group p-1 m-1">
                                    <button type="submit" class="btn btn-primary form-control mt-3">Update</button>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

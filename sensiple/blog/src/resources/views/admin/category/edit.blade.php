@extends('user::admin.layout.app')
@section('title', 'Category Edit')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Categories Lists
                            @if (auth()->user()->can('Categories List'))
                                <a href="{{ url('blog/admin/category') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/category') }}/{{ $category->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Edit Category </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control mt-1" id=""
                                        value="{{ $category->name }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="description">Category Description </label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $category->description }}</textarea>
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

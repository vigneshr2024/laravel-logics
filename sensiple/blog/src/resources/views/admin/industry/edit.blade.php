@extends('user::admin.layout.app')
@section('title', 'Industry Edit')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Industries Lists
                            @if (auth()->user()->can('Industries List'))
                                <a href="{{ url('blog/admin/industry') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/industry') }}/{{ $industry->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Edit Industry </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control mt-1" id=""
                                        value="{{ $industry->name }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="description">Industry Description </label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $industry->description }}</textarea>
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

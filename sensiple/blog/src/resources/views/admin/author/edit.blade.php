@extends('user::admin.layout.app')
@section('title', 'Author Edit')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Authors Lists
                            @if (auth()->user()->can('Authors List'))
                                <a href="{{ url('blog/admin/author') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/author') }}/{{ $author->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Edit Author </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control mt-1" id=""
                                        value="{{ $author->name }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="description">Author Description </label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $author->description }}</textarea>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <div class="row">
                                        <div class="col">
                                            <label for="image">Profile</label>
                                            <input type="file" name="profile_image" id="image" class="form-control">
                                        </div>
                                        <div class="col">
                                            <img src="{{ asset($author->profile_image) }}" height="75" width="75"
                                                alt="" srcset="">
                                        </div>
                                    </div>`
                                </div>
                                <div class="form-group p-1 m-1">
                                    <fieldset class="row mb-3">
                                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                        <div class="col-sm-10">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="gridRadios1" value="active" checked>
                                                <label class="form-check-label" for="gridRadios1">
                                                    Active
                                                </label>
                                            </div>
                                            <div class="form-check ">
                                                <input class="form-check-input" type="radio" name="status"
                                                    id="gridRadios2" value="inactive">
                                                <label class="form-check-label" for="gridRadios2">
                                                    Inactive
                                                </label>
                                            </div>
                                        </div>
                                    </fieldset>
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

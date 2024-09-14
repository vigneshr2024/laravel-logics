@extends('user::admin.layout.app')
@section('title', 'Author Create')
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
                        <form action="{{ url('blog/admin/author') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Create Author </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control mt-1" id=""
                                        placeholder="Enter Author Name" value="{{ old('name') }}" required title="Please Enter author name.">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="description">Author Description </label>
                                    <textarea name="description" id="" cols="30" rows="5"
                                        class="form-control"value="{{ old('description') }}" required></textarea>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="image">Profile image:</label>
                                    <input type="file" name="profile_image" id="image" class="form-control" required title="Please select the Profile Image.">
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

@extends('user::admin.layout.app')
@section('title', 'Social Media Edit')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Social Media Lists
                            @if (auth()->user()->can('Social Media List'))
                                <a href="{{ url('blog/admin/media') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/media') }}/{{ $media->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Edit Social Media </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control mt-1" id=""
                                        value="{{ $media->facebook }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram" class="form-control mt-1" id=""
                                        value="{{ $media->instagram }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" class="form-control mt-1" id=""
                                        value="{{ $media->twitter }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" name="linkedin" class="form-control mt-1" id=""
                                        value="{{ $media->linkedin }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="youtube">YouTube</label>
                                    <input type="text" name="youtube" class="form-control mt-1" id=""
                                        value="{{ $media->youtube }}">
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

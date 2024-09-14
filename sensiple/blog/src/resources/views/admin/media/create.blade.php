@extends('user::admin.layout.app')
@section('title', 'Social Media Create')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Social Medias Lists
                            @if (auth()->user()->can('Social Media List'))
                                <a href="{{ url('blog/admin/media') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/media') }}" method="post">
                            @csrf
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Create </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" name="facebook" class="form-control mt-1" id=""
                                        placeholder="Enter Facebook ID" value="{{ old('facebook') }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" name="instagram" class="form-control mt-1" id=""
                                        placeholder="Enter Instagram ID" value="{{ old('instagram') }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" name="twitter" class="form-control mt-1" id=""
                                        placeholder="Enter Twitter ID" value="{{ old('twitter') }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="linkedin">LinkedIn</label>
                                    <input type="text" name="linkedin" class="form-control mt-1" id=""
                                        placeholder="Enter LinkedIn ID" value="{{ old('linkedin') }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" name="youtube" class="form-control mt-1" id=""
                                        placeholder="Enter Youtube ID" value="{{ old('youtube') }}">
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

@extends('user::admin.layout.app')
@section('title', 'Policy Edit')
@section('page-css')
    <!-- Bootstrap CSS -->
    {{-- <link
     href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"
     rel="stylesheet"> --}}
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" />
@endsection
@section('page-script')
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Summernote JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#content').summernote({
                // placeholder: 'Hello Bootstrap 5',
                tabsize: 2,
                height: 100
            });
        });
    </script>
@endsection
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">Policy List
                            @if (auth()->user()->can('Policies List'))
                                <a href="{{ url('admin/policy') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('admin/policy') }}/{{ $policy->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Edit Policy </h5>
                                <div class="form-group p-1 m-1">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control mt-1" id=""
                                        value="{{ old('title', $policy->title) }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="policy_url">Policy Page URL</label>
                                    <input type="text" name="policy_url" class="form-control mt-1" id=""
                                        value="{{ old('policy_url', $policy->policy_url) }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <div class="container-fluid">
                                        <label for="content">Content</label>
                                        <textarea id="content" name="content">{{ old('content', $policy->content) }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="type">Policy Type</label>
                                    <select name="type" class="form-control" id="">
                                        <option value="">SELECT Type</option>
                                        <option value="terms&conditions"
                                            @if ($policy->type == 'terms&conditions') @selected(true) @endif>Terms &
                                            Conditions
                                        </option>
                                        <option value="privacy-policy"
                                            @if ($policy->type == 'privacy-policy') @selected(true) @endif>Privacy
                                            Policy
                                        </option>
                                        <option value="support-policy"
                                            @if ($policy->type == 'support-policy') @selected(true) @endif>Support
                                            Policy
                                        </option>
                                    </select>
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

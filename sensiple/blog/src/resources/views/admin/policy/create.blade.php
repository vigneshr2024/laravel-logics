@extends('user::admin.layout.app')
@section('title', 'Policy Create')
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
                tabsize: 4,
                height: 200
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
                        <form action="{{ url('admin/policy') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Create Post </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="title">Title</label>
                                    <input type="text" name="title" class="form-control mt-1" id=""
                                        placeholder="Enter Title " required>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <div class="container-fluid">
                                        <label for="content">Content</label>
                                        <textarea id="content"  name="content" required  title="please enter your content."></textarea>
                                    </div>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="type">Policy Type</label>
                                    <select name="type" class="form-control" id="" required>
                                        <option value="">SELECT Type</option>
                                        <option value="terms&conditions">Terms & Conditions</option>
                                        <option value="privacy-policy">Privacy Policy</option>
                                        <option value="support-policy">Support Policy</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group p-1 m-1">
                                <button type="submit" class="btn btn-primary form-control mt-3">Create</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

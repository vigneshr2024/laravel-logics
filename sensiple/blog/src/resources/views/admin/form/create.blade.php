@extends('user::admin.layout.app')
@section('title', 'form Create')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">forms Lists
                            @if (auth()->user()->can('Forms List'))
                                <a href="{{ url('blog/admin/form') }}" class="btn btn-info text-right">Lists</a>
                            @endif
                        </h5>
                        <form action="{{ url('blog/admin/form') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Create form </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="form_name">Form Name</label>
                                    <input type="text" name="form_name" class="form-control mt-1" id=""
                                        placeholder="Enter form Name" required title="Please Enter form name.">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="form_views">Form Views</label>
                                    <input type="text" name="form_views" class="form-control mt-1" id=""
                                        placeholder="Enter Form Views" required title="Please Enter form views.">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="form_domain">Form Domain</label>
                                    <select name="form_domain" class="form-control" id="">
                                        <option value="">SELECT Domain</option>
                                        <option value="cloudsens" selected>CloudSens</option>
                                        <option value="docuai">DocuAI</option>
                                    </select>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="FormFields">Form Fields </label>
                                    <textarea name="form_fields" id="" cols="30" rows="5"
                                        class="form-control"value=""></textarea>
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

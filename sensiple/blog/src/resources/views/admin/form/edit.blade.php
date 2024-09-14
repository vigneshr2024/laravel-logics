@extends('user::admin.layout.app')
@section('title', 'Form Edit')
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
                        <form action="{{ url('blog/admin/form') }}/{{ $form->id }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Edit form </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="form_name">Form Name</label>
                                    <input type="text" name="form_name" class="form-control mt-1" id=""
                                        placeholder="Enter form Name" value="{{ $form->form_name }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="form_url">Form URL</label>
                                    <input type="text" name="form_url" class="form-control mt-1" id=""
                                        placeholder="Enter form view" value="{{ $form->form_url }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="form_views">Form Views</label>
                                    <input type="text" name="form_views" class="form-control mt-1" id=""
                                        placeholder="Enter Form Views" value="{{ $form->form_views }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="form_domain">Form Domain</label>
                                    <input type="text" name="form_domain" class="form-control mt-1" id=""
                                        placeholder="Enter Form Domain" value="{{ $form->form_domain }}">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="FormFields">Form Fields </label>
                                    <textarea name="form_fields" id="" cols="30" rows="5"
                                        class="form-control">{{$form->form_fields}}</textarea>
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

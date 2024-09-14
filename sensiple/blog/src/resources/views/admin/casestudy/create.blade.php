@extends('user::admin.layout.app')
@section('title', 'CaseStudy Create')
@section('content')
    <section class="section">
        @include('user::admin.layout.message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">CaseStudies Lists <a href="{{ url('blog/admin/casestudy') }}"
                                class="btn btn-info text-right">Lists
                            </a></h5>
                        <form action="{{ url('blog/admin/casestudy') }}" method="post">
                            @csrf
                            <div class="card-body table-responsive">
                                <h5 class="card-title">Create CaseStudy </h5>

                                <div class="form-group p-1 m-1">
                                    <label for="name">Name</label>
                                    <input type="text" name="name" class="form-control mt-1" id=""
                                        placeholder="Enter CaseStudy Name" value="{{ old('name') }}" required title="Please Enter the casestudy name">
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="description">CaseStudy Description </label>
                                    <textarea name="description" id="" cols="30" rows="10" class="form-control"
                                        value="{{ old('name') }}"></textarea>
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

@extends('user::admin.layout.app')
@section('title', 'SEO Management')
@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    @include('user::admin.layout.message')
                    <div class="card-body table-responsive ">
                        <h5 class="card-title">SEO Basics</h5>
                        <form action="{{ url('blog/admin/seo') }}/{{ $seo->id }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            @if (auth()->user()->can('SEO Basic Setting Sitemap'))
                                <div class="form-group p-1 m-1">
                                    <div class="row">
                                        <div class="col">
                                            <label for="image">Sitemap</label>
                                            <input type="file" name="sitemap_file_location" class="form-control"
                                                accept=".xml">
                                        </div>
                                        <div class="col mt-4">
                                            @if (isset($seo->sitemap_file_location))
                                                <a href="{{ asset($seo->sitemap_file_location) }}" target='_blank'>current
                                                    sitemap</a>
                                                <p>{{ $seo->sitemap_updated_at }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (auth()->user()->can('SEO Basic Setting Robots'))
                                <div class="form-group p-1 m-1">
                                    <div class="row">
                                        <div class="col">
                                            <label for="image">Robots</label>
                                            <input type="file" name="robots_file_location" class="form-control"
                                                accept=".txt">
                                        </div>
                                        <div class="col mt-4">
                                            @if (isset($seo->robots_file_location))
                                                <a href="{{ asset($seo->robots_file_location) }}" target='_blank'>current
                                                    robots</a>
                                                <p>{{ $seo->robots_updated_at }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @if (auth()->user()->can('SEO Basic Tags'))
                                <div class="form-group p-1 m-1">
                                    <label for="name">Header_tag </label>
                                    <textarea name="header_tags" id="" cols="30" rows="5" class="form-control">{{ $seo->header_tags }}</textarea>
                                </div>
                                <div class="form-group p-1 m-1">
                                    <label for="name">Footer_tags </label>
                                    <textarea name="footer_tags" id="" cols="30" rows="5" class="form-control">{{ $seo->footer_tags }}</textarea>
                                </div>
                            @endif
                            <div class="form-group p-1 m-1">
                                <button type="submit" class="btn btn-primary form-control mt-3"> Update</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@extends('layout.app')

@section('content')
    <!-- Start Breadcrumb section -->
    @if (isset($policies))
        <div class="breadcrumb-section"
            style="background-image: url({{ asset('assets/img/innerpage/breadcrumb-bg1.png') }}), linear-gradient(180deg, #121212 0%, #121212 100%);">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-wrapper">
                            <div class="banner-content">
                                <ul class="breadcrumb-list">
                                    <li><a href="/">Home</a></li>
                                    <li>{{ $policies->type }}</li>
                                </ul>
                                <h1>{{ $policies->title }}</h1>
                            </div>
                            <div class="scroll-down-btn">
                                <a href="#blog-details">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="19" height="29"
                                        viewBox="0 0 19 29">
                                        <path
                                            d="M9.5 0V28M9.5 28C10 24.3333 12.4 17.1 18 17.5M9.5 28C8.5 24.1667 5.4 16.7 1 17.5" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="blog-details-content">
            <div class="row justify-content-center g-4">
                <div class="col-lg-8">
                    {!! $policies->content !!}
                </div>
            </div>
        </div>
        <!-- End Breadcrumb section -->
    @endif
@endsection

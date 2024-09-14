<div class="container">
    <div class="row mb-60">
        <div class="col-lg-12">
            <div class="section-title5">
                <span class="sub-title5 two">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                        <path
                            d="M3.7081 12.9544C3.41861 13.1128 3.09011 12.8352 3.14861 12.4808L3.7711 8.69694L1.12886 6.01223C0.882112 5.76104 1.01036 5.30186 1.34111 5.25226L5.0146 4.69548L6.6526 1.23399C6.80035 0.922003 7.2001 0.922003 7.34785 1.23399L8.98584 4.69548L12.6593 5.25226C12.9901 5.30186 13.1183 5.76104 12.8708 6.01223L10.2293 8.69694L10.8518 12.4808C10.9103 12.8352 10.5818 13.1128 10.2923 12.9544L6.9991 11.1497L3.7081 12.9544Z">
                        </path>
                    </svg>
                    Case Study
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14">
                        <path
                            d="M3.7081 12.9544C3.41861 13.1128 3.09011 12.8352 3.14861 12.4808L3.7711 8.69694L1.12886 6.01223C0.882112 5.76104 1.01036 5.30186 1.34111 5.25226L5.0146 4.69548L6.6526 1.23399C6.80035 0.922003 7.2001 0.922003 7.34785 1.23399L8.98584 4.69548L12.6593 5.25226C12.9901 5.30186 13.1183 5.76104 12.8708 6.01223L10.2293 8.69694L10.8518 12.4808C10.9103 12.8352 10.5818 13.1128 10.2923 12.9544L6.9991 11.1497L3.7081 12.9544Z">
                        </path>
                    </svg>
                </span>
                <h2>See More <span>Case Studies.</span></h2>
            </div>
        </div>
    </div>
    <div class="row g-4">
        @if (count($casestudies) > 0)
            @foreach ($casestudies as $casestudy)
                <div class="col-xl-4 col-md-6">
                    <div class="case-study-card style-2">
                        <div class="card-img">
                            <img src="{{ asset($casestudy->thumbnail_image) }}" alt="">
                        </div>
                        <div class="card-content">
                            {{-- <a href="/case-study/{{ $casestudy->post_url }}">Startup Company</a> --}}
                            <h4><a href="/case-study/{{ $casestudy->post_url }}">{{ $casestudy->title }}</a>
                            </h4>
                            <p>{{ $casestudy->description }}</p>
                            <a href="/case-study/{{ $casestudy->post_url }}" class="learn-more-btn">Learn MORE
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="9"
                                    viewBox="0 0 17 9">
                                    <path
                                        d="M12.1691 4.97333L0.234337 4.95394C0.172187 4.95394 0.112583 4.9041 0.0686358 4.81538C0.024689 4.72666 0 4.60634 0 4.48087C0 4.35541 0.024689 4.23509 0.0686358 4.14637C0.112583 4.05765 0.172187 4.00781 0.234337 4.00781L12.1694 4.02721C12.2315 4.02721 12.2911 4.07705 12.3351 4.16576C12.379 4.25448 12.4037 4.37481 12.4037 4.50027C12.4037 4.62573 12.379 4.74606 12.3351 4.83478C12.2911 4.92349 12.2313 4.97333 12.1691 4.97333Z" />
                                    <path
                                        d="M16.9998 4.50591C14.3171 5.49934 10.9879 7.19858 8.9248 9L10.5521 4.50024L8.93094 0C10.9922 1.80378 14.3185 3.50681 16.9998 4.50591Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>

<h5 class="widget-title">Popular Post </h5>
@if (isset($blogs) && count($blogs) > 0)
    @foreach ($blogs as $blog)
        <div class="recent-post-widget mb-20">
            <div class="recent-post-img">
                <a href="/blog-details"><img src="{{ asset($blog->thumbnail_image) }}" alt=""></a>
            </div>
            <div class="recent-post-content">
                <a href="/blogs/{{ $blog->post_url }}">{{ $blog->publish_date }}</a>
                <h6><a href="/blogs/{{ $blog->post_url }}">{{ $blog->title }}</a></h6>
            </div>
        </div>
    @endforeach
@endif

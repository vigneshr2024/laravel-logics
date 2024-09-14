<h5 class="widget-title">New Tags</h5>
<ul class="tag-list">
    @foreach ($tags as $tag)
        <li>
            <a href="/blogs">{{ $tag->name }}</a>
        </li>
    @endforeach
</ul>

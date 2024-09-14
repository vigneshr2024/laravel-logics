@if (isset($medias))
    <ul class="social-list">
        @foreach ($medias as $media)
            <li>
                <a href="{{ url($media->linkedin) }}">
                    <i class="bi bi-linkedin"></i>
                    <span>LinkedIn</span>   
                </a>
            </li>
            <li>
                <a href="{{ url($media->facebook) }}">
                    <i class="bi bi-facebook"></i>
                    <span>Facebook</span>
                </a>
            </li>
            <li>
                <a href="{{ url($media->twitter) }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor"
                        class="bi bi-twitter-x" viewBox="0 0 16 16">
                        <path
                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865l8.875 11.633Z" />
                    </svg>
                    <span>Twitter</span>
                </a>
            </li>
            <li>
                <a href="{{ url($media->youtube) }}">
                    <i class="bi bi-youtube"></i>
                    <span>YouTube</span>
                </a>
            </li>
        @endforeach
    </ul>
@endif

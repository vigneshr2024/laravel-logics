<h5 class="widget-title">Category</h5>
@if (count($categories) > 0)
    <ul class="category-list">
        @foreach ($categories as $category)
            <li>
                <a href="/blogs">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="14" viewBox="0 0 13 14">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.0354 1.65188L0 12.6867L0.814262 13.501L11.8491 2.46556V10.0955H13V0.500977H3.40552V1.65188H11.0354Z" />
                        </svg>
                        {{ $category->name }}
                    </span>
                    <span>(20)</span>
                </a>
            </li>
        @endforeach
    </ul>
@endif

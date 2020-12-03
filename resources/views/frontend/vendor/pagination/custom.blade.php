@if ($paginator->hasPages())
    <div class="products__pagination">
        <ul class="pagination-nav">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="pagination-item first">
                    <a href="" disabled="disabled:">
                        <img src="frontend-assets/img/logos/arrow-left.svg" alt="">
                    </a>
                </li>
            @else
                <li class="pagination-item first">
                    <a href="{{ $paginator->previousPageUrl() }}" aria-label="@lang('pagination.previous')">
                        <img src="frontend-assets/img/logos/arrow-left.svg" alt="">
                    </a>
                </li>
            @endif
            <div class="center-bg">
                {{-- Pagination Elements --}}
                @foreach ($elements as $element)
                    {{-- "Three Dots" Separator --}}
                    @if (is_string($element))
                        <li class="page-item disabled" aria-disabled="true"><span>{{ $element }}</span></li>
                    @endif

                    {{-- Array Of Links --}}
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="pagination-item onclick active">
                                    <a href="" disabled="disabled">
                                        {{$page}}
                                    </a>
                                </li>
                            @else
                                <li class="pagination-item onclick ">
                                    <a href="{{ $url }}">
                                        {{$page}}
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    @endif
                @endforeach
            </div>
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="pagination-item last">
                    <a href="{{ $paginator->nextPageUrl() }}" aria-label="@lang('pagination.next')">
                        <img src="frontend-assets/img/logos/arrow-right.svg" alt="">
                    </a>
                </li>
            @else
                <li class="pagination-item last">
                    <a href="" disabled="disabled" aria-label="@lang('pagination.next')">
                        <img src="frontend-assets/img/logos/arrow-right.svg" alt="">
                    </a>
                </li>
            @endif
        </ul>
    </div>
@endif


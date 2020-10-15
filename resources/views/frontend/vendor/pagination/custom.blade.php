@if ($paginator->hasPages())
        <div class="catalogue__pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <a class="catalogue__pagination-link" aria-label="@lang('pagination.previous')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9.396" height="10.249"
                         viewBox="0 0 9.396 10.249">
                        <g id="Group_1991" data-name="Group 1991" transform="translate(-972.895 -1178)">
                            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                                  d="M13.017,11.317l3.878-3.875a.732.732,0,0,0-1.037-1.034L11.464,10.8a.731.731,0,0,0-.021,1.01l4.412,4.421a.732.732,0,1,0,1.037-1.034Z"
                                  transform="translate(961.645 1171.807)"/>
                            <path id="Icon_ionic-ios-arrow-back-2" data-name="Icon ionic-ios-arrow-back"
                                  d="M12.568,10.015l2.893-2.89a.546.546,0,0,0-.774-.772L11.41,9.628a.545.545,0,0,0-.016.753l3.291,3.3a.546.546,0,0,0,.774-.772Z"
                                  transform="translate(966.67 1173.109)"/>
                        </g>
                    </svg>
                </a>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')" class="catalogue__pagination-link">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9.396" height="10.249"
                         viewBox="0 0 9.396 10.249">
                        <g id="Group_1991" data-name="Group 1991" transform="translate(-972.895 -1178)">
                            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                                  d="M13.017,11.317l3.878-3.875a.732.732,0,0,0-1.037-1.034L11.464,10.8a.731.731,0,0,0-.021,1.01l4.412,4.421a.732.732,0,1,0,1.037-1.034Z"
                                  transform="translate(961.645 1171.807)"/>
                            <path id="Icon_ionic-ios-arrow-back-2" data-name="Icon ionic-ios-arrow-back"
                                  d="M12.568,10.015l2.893-2.89a.546.546,0,0,0-.774-.772L11.41,9.628a.545.545,0,0,0-.016.753l3.291,3.3a.546.546,0,0,0,.774-.772Z"
                                  transform="translate(966.67 1173.109)"/>
                        </g>
                    </svg>
                </a>
            @endif

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
                            <a class="catalogue__pagination-link activable active">
                                {{ $page }}
                            </a>
                        @else
                            <a href="{{ $url }}" class="catalogue__pagination-link activable">
                                {{ $page }}
                            </a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="catalogue__pagination-link" rel="next" aria-label="@lang('pagination.next')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9.396" height="10.249"
                         viewBox="0 0 9.396 10.249">
                        <g id="Group_1991" data-name="Group 1991" transform="translate(0)">
                            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                                  d="M15.343,11.317,11.466,7.442A.732.732,0,0,1,12.5,6.408L16.9,10.8a.731.731,0,0,1,.021,1.01l-4.412,4.421a.732.732,0,0,1-1.037-1.034Z"
                                  transform="translate(-7.714 -6.194)"/>
                            <path id="Icon_ionic-ios-arrow-back-2" data-name="Icon ionic-ios-arrow-back"
                                  d="M14.3,10.015,11.411,7.125a.546.546,0,0,1,.774-.772l3.277,3.275a.545.545,0,0,1,.016.753l-3.291,3.3a.546.546,0,0,1-.774-.772Z"
                                  transform="translate(-11.251 -4.891)"/>
                        </g>
                    </svg>
                </a>
            @else
                <a class="catalogue__pagination-link" rel="next" aria-label="@lang('pagination.next')">
                    <svg xmlns="http://www.w3.org/2000/svg" width="9.396" height="10.249"
                         viewBox="0 0 9.396 10.249">
                        <g id="Group_1991" data-name="Group 1991" transform="translate(0)">
                            <path id="Icon_ionic-ios-arrow-back" data-name="Icon ionic-ios-arrow-back"
                                  d="M15.343,11.317,11.466,7.442A.732.732,0,0,1,12.5,6.408L16.9,10.8a.731.731,0,0,1,.021,1.01l-4.412,4.421a.732.732,0,0,1-1.037-1.034Z"
                                  transform="translate(-7.714 -6.194)"/>
                            <path id="Icon_ionic-ios-arrow-back-2" data-name="Icon ionic-ios-arrow-back"
                                  d="M14.3,10.015,11.411,7.125a.546.546,0,0,1,.774-.772l3.277,3.275a.545.545,0,0,1,.016.753l-3.291,3.3a.546.546,0,0,1-.774-.772Z"
                                  transform="translate(-11.251 -4.891)"/>
                        </g>
                    </svg>
                </a>
            @endif
        </div>
@endif

